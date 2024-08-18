<?php
session_start();
include 'koneksi.php';
require 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();   
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Password is incorrect!";
        }
    } else {
        $error = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./admin/img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="./admin/css/style.min.css">
</head>
<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Welcome Back BAMC Squad!</h1>
            <p class="sign-up__subtitle">Sign in to your account to continue</p>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <form class="sign-up-form form" action="login.php" method="post">
                <label class="form-label-wrapper">
                    <p class="form-label">Email</p>
                    <input class="form-input" type="text" placeholder="Enter your email" required name="email">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" placeholder="Enter your password" required name="password">
                </label>
                <button class="form-btn primary-default-btn transparent-btn" type="submit" name="login">Sign in</button>
                <br>
                <p class="sign-up__footer">Don't have an account? <a href="register.php">Sign up here</a></p>
            </form>
        </article>
    </main>

    <!-- Chart library -->
    <script src="./admin/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="admin/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="admin/js/script.js"></script>
</body>
</html>
