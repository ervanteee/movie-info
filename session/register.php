<?php
session_start();
ini_set('display_errors', 0);
include('../connection/koneksi.php');
$conn = getConnection();

if($_SESSION['login'] == true){
    header('Location: ../index/main.php');
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Check if password and re-password match
    if ($password != $repassword) {
        $error = "Password and re-password do not match.";
    } else {

        // Use placeholders in the SQL query to prevent SQL injection
        $result = $conn->prepare("INSERT INTO admin (username, email, phone, password) VALUES (?, ?, ?, ?)");
        $result->execute([$username, $email, $phone, $password]);

        if ($result) {
            // Success
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
         header('Location: ../index/main.php');
            exit();
        } else {
            // Failure
            $error = "Registration failed.";
        }
    }
}
?>

<html>
<?php include('../header/head.php')?>
<?php include('../header/navbar-login.php')?>


<body class="login-bg-base">
    <?php if($error != ""){ ?>
        <h2 class=""><?= $error ?></h2>
    <?php } ?>

    <div class="container regist-bg w-25 rounded pt-4">
        <h1 class="login-text mb-4  text-start ms-4 pt-4">Register</h1>
        <form action="/MovieProject/session/register.php" method="post">
            <div class="mb-3 w-75 ms-5">
                <label for="username" class="form-label ">Username :</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="email" class="form-label ">Email:</label>
                <input type="email" name="email"  placeholder="Email"class="form-control" required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="phone" class="form-label  ">Phone Number:</label>
                <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="password" class="form-label ">Password:</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="repassword" class="form-label ">Re-Password:</label>
                <input type="password" name="repassword" placeholder="Re-Password" class="form-control" required>
            </div>
            <input type="submit" value="Register" class="btn btn-success w-50 mx-auto d-block mt-5">
            <div class="mt-3 pb-4 mt-4 text-center ">
                <a href="login.php" class="sign-underline">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>
