<?php
session_start();
ini_set('display_errors', 0);

if($_SESSION['login'] != true){
    header('Location: login.php');
    exit();
}
$say = "Hello " . $_SESSION['username'];
?>

<html>
<?php include('../header/head.php')?>
<?php include('../header/navbar.php')?>
<body>
    
<h1><?= $say ?></h1>
<a href=" logout.php">Logout</a>
</body>
</html>