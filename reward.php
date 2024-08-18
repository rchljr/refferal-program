<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT name, points FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$stmt = $conn->prepare("SELECT u.name FROM users u JOIN referrals r ON u.id = r.new_user_id WHERE r.referrer_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$referrals = $stmt->get_result();
?>

<h1>Welcome, <?php echo $user['name']; ?>!</h1>
<p>Your points: <?php echo $user['points']; ?></p>

<h2>Your Referrals:</h2>
<ul>
    <?php while ($referral = $referrals->fetch_assoc()): ?>
        <li><?php echo $referral['name']; ?></li>
    <?php endwhile; ?>
</ul>
