<?php
session_start();
include('../header/navbar.php'); 
include('../header/head.php'); 
include('../connection/koneksi.php'); 
include('../admin/crud.php'); 
$usr = $_SESSION['username'];

$conn = getConnection();
$sql = "SELECT * FROM admin where username = '$usr'";
$result = $conn->query($sql);
forEach ($result as $row) {
                
}
?>
 <head>

 </head>
 <body class="bg-white-update">
    <div class="container login-bg w-25 rounded pt-4">
        <h1 class="login-text mb-4  text-start ms-4 pt-4 ">Profile</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-items-center">
                <img src='<?= $row['path_gambar'] ?>' class="rounded-circle img-profile text-center" >
            </div>

            <div class="d-flex justify-content-center align-items-center">
            <input type="file" name="upload" id="upload" >
                <label for="files" class="text-success m-3">Update Photo</label>
            </div>
            <div class="mb-3 w-75 ms-5">
                <input type='hidden' name='id' value='<?= $row['id'] ?>' >
                <label for="username" class="form-label text-success ">Username</label>
                <input type="text" name="username"  class="form-control" value='<?= $row['username'] ?>' required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="email" class="form-label text-success ">Email</label>
                <input type="email" name="email"  class="form-control" value='<?= $row['email'] ?>' required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="number" class="form-label text-success ">Phone</label>
                <input type="number" name="phone"  class="form-control" value='<?= $row['phone'] ?>' required>
            </div>
            <div class="mb-3 w-75 ms-5">
                <label for="password" class="form-label text-success ">Password</label>
                <input type="text" name="password" class="form-control" value='<?= $row['password'] ?>' required>
            </div>
            <div class="text-center p-3">
            <input type='submit' name='update' value='Update' class='btn btn-primary confirm w-50'>
            </div>
        </form>
    </div>
</body>
