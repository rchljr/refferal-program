<?php
include 'koneksi.php';
require 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $referral_code = $_POST['referral_code'] ?? null;

    $user_code = substr(md5(uniqid(rand(), true)), 0, 8);

    $stmt = $koneksi->prepare("INSERT INTO users (name, email, password, referral_code) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $user_code);
    $stmt->execute();

    $new_user_id = $stmt->insert_id;

    if ($referral_code) {
        $stmt = $koneksi->prepare("SELECT id FROM users WHERE referral_code = ?");
        $stmt->bind_param("s", $referral_code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $referrer = $result->fetch_assoc();
            $referrer_id = $referrer['id'];

            $stmt = $koneksi->prepare("INSERT INTO referrals (referrer_id, new_user_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $referrer_id, $new_user_id);
            $stmt->execute();

            $koneksi->query("UPDATE users SET points = points + 50 WHERE id = $referrer_id");
            $koneksi->query("UPDATE users SET points = points + 50 WHERE id = $new_user_id");
        }
    }

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./admin/img/svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./admin/css/style.min.css">
    <title>Register</title>
</head>
<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Join BAMC Squad!</h1>
            <p class="sign-up__subtitle">Create your account to get started</p>
            <form class="sign-up-form form" action="register.php" method="post">
                <label class="form-label-wrapper">
                    <p class="form-label">Name</p>
                    <input class="form-input" type="text" placeholder="Enter your name" required name="name">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Email</p>
                    <input class="form-input" type="email" placeholder="Enter your email" required name="email">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" placeholder="Enter your password" required name="password">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Referral Code (Optional)</p>
                    <input class="form-input" type="text" placeholder="Enter referral code" name="referral_code">
                </label>
                <button class="form-btn primary-default-btn transparent-btn" type="submit">Sign Up</button>
                <br>
                <p class="sign-up__footer">Already have an account? <a href="login.php">Sign in here</a></p>
            </form>
        </article>
    </main>

    <script src="./admin/plugins/chart.min.js"></script>
    <script src="admin/plugins/feather.min.js"></script>
    <script src="admin/js/script.js"></script>
</body>
</html>
