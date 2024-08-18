<?php
session_start();
require 'layouts/header.php';
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (!$koneksi instanceof mysqli) {
    die('Database connection not initialized.');
}

$stmt = $koneksi->prepare("SELECT name, email, referral_code, points FROM users WHERE id = ?");
if (!$stmt) {
    die('Prepare failed: ' . htmlspecialchars($koneksi->error));
}

$stmt->bind_param("i", $user_id);
if (!$stmt->execute()) {
    die('Execute failed: ' . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
if (!$result) {
    die('Get result failed: ' . htmlspecialchars($stmt->error));
}

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (!is_array($user)) {
        die('Fetched data is not an array.');
    }
} else {
    die('User not found.');
}

$stmt->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - BAMC</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/custom-style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">YOUR PROFILE</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($user) && is_array($user)): ?>
                            <p><strong>Name:</strong>
                                <?php echo htmlspecialchars($user['name']); ?>
                            </p>
                            <p><strong>Email:</strong>
                                <?php echo htmlspecialchars($user['email']); ?>
                            </p>
                            <p><strong>Referral Code:</strong>
                                <?php echo htmlspecialchars($user['referral_code']); ?>
                            </p>
                            <p><strong>Points:</strong>
                                <?php echo htmlspecialchars($user['points']); ?>
                            </p>
                        <?php else: ?>
                            <p>Error: Unable to retrieve user information.</p>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-right">
                        <button id="share-button" class="btn btn-primary">Share Referral Code</button>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('share-button').addEventListener('click', () => {
            const referralCode = <?php echo json_encode($user['referral_code']); ?>;

            if (navigator.share) {
                navigator.share({
                    title: 'Kode Referral BAMC',
                    text: `Gunakan kode referral saya untuk mendapatkan keuntungan: ${referralCode}`,
                    url: window.location.href
                })
                    .then(() => console.log('Berhasil dibagikan'))
                    .catch((error) => console.error('Gagal dibagikan', error));
            } else {
                alert('Web Share API tidak didukung di browser ini.');
            }
        });
    </script>
</body>
</html>

<?php require 'layouts/footer.php' ?>