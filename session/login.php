<?php
session_start();
ini_set('display_errors', 0);
include('../connection/koneksi.php');
$conn = getConnection();

if($_SESSION['login'] == true){
    header('Location: ../index/main.php');
    exit();
}

$error = "Gagal Login";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if it's an admin login
    $adminResult = $conn->prepare("SELECT * FROM admin_real WHERE username = ? AND password = ?");
    $adminResult->execute([$username, $password]);

    $adminRow = $adminResult->fetch(PDO::FETCH_ASSOC);

    // Check if it's a user login
    $userResult = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $userResult->execute([$username, $password]);

    $userRow = $userResult->fetch(PDO::FETCH_ASSOC);

    if ($adminRow) {
        // Admin login success
        $_SESSION['login'] = true;
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $username;
        header('Location: ../index/main.php');
        exit();
    } elseif ($userRow) {
        // User login success
        $_SESSION['login'] = true;
        $_SESSION['admin'] = false;
        $_SESSION['username'] = $username;
        header('Location: ../index/main.php');
        exit();
    } else {
        echo "<script type='text/javascript'>alert('$error');</script>";
     header('Location: login.php');

    }
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <?php include('../header/head.php');?>
    <?php include('../header/navbar-login.php')?>

</head>
<body class="login-bg-base">
    <div class="container login-bg w-25 rounded pt-4">
        <h1 class="login-text mb-4  text-start ms-4 pt-4">Sign In</h1>
        <form action="/MovieProject/session/login.php" method="post">
            <div class="mb-3 w-75 ms-5">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="text-center">
                <input type="submit" value="Login" class="btn btn-success w-50 mx-auto d-block mt-5">
                <div class="mt-3 pb-4 mt-4">
                    <a href="register.php" class="sign-underline">Sign Up Now</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
