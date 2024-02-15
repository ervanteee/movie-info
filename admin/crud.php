<?php
session_start();
require_once('../connection/koneksi.php');

$conn = getConnection();
ini_set('display_errors', 0);

// Function to sanitize user inputs
function sanitizeInput($input)
{
    return trim($input); // Only trim, htmlspecialchars should be used when displaying data
}

// Function to add admin data
function addAdmin($conn, $username, $email, $phone, $password)
{
    $username = sanitizeInput($username);
    $email = sanitizeInput($email);
    $phone = sanitizeInput($phone);
    $password = sanitizeInput($password);

    $sql = "INSERT INTO admin (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
    return $conn->query($sql);
}

function request($conn, $usr_req, $request)
{
    $usr_req = $_SESSION["username"];
    $request = sanitizeInput($request);

    $sql = "INSERT INTO request (username, request) VALUES ('$usr_req', '$request')";
    return $conn->query($sql);
}
// Function to update admin data
function updateAdmin($conn, $id, $username, $email, $phone, $password, $file)
{
    // $username = sanitizeInput($username);
    // $email = sanitizeInput($email);
    // $phone = sanitizeInput($phone);
    // $password = sanitizeInput($password);

    // $sql = "UPDATE admin SET username='$username', email='$email', phone='$phone', password='$password' WHERE id=$id";
    // $_SESSION['username'] = $username;

    // return $conn->query($sql);
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $target = __DIR__ . '/gallery/';
        $destination = $target . $name;
        $url = 'http://192.168.183.40/movieproject/admin/gallery/';
        $id = sanitizeInput($id);
        $username = sanitizeInput($username);
        $email = sanitizeInput($email);
        $phone = sanitizeInput($phone);
        $password = sanitizeInput($password);

        $sqlGet = "SELECT path_gambar FROM admin  WHERE id=$id";
        $result = $conn->query($sqlGet);
        forEach ($result as $row) {
        }
        $urlPthGbr = basename(implode(" ",$row));
        // echo $urlPthGbr;
        // echo '<br>';
        // echo $name;
        $sql = "UPDATE admin SET username='$username', email='$email', phone='$phone', password='$password' WHERE id=$id";

        if( $name !== "" && $name !== $urlPthGbr){
            $sql = "UPDATE admin SET username='$username', email='$email', phone='$phone', password='$password', path_gambar='$url$name' WHERE id=$id";
            if (move_uploaded_file($tmp_name, $destination)) {
                echo "File berhasil diunggah.";
            } else {
                echo "Terjadi kesalahan saat mengunggah file.";
            }
        }
        // echo $sql;
        $_SESSION['username'] = $username;
        return $conn->query($sql);
    }
}

// Function to delete admin data
function deleteAdmin($conn, $id)
{
    $sql = "DELETE FROM admin WHERE id=$id";
    return $conn->query($sql);
}

$success = "Admin data updated successfully.";
$failed = "Error updating data.";

// Check if the form for update, delete, or add is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // Add validation if necessary

        if (updateAdmin($conn, $id, $username, $email, $phone, $password, $file)) {
            echo "<script type='text/javascript'>alert('$success');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$failed');</script>";
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];

        // Add validation if necessary

        if (deleteAdmin($conn, $id)) {
            echo "<script type='text/javascript'>alert('$success');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$failed');</script>";
        }
    } elseif (isset($_POST['add'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // Add validation if necessary

        if (addAdmin($conn, $username, $email, $phone, $password)) {
            echo "<script type='text/javascript'>alert('$success');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$failed');</script>";
        }
    }elseif (isset($_POST['request'])) {
        $usr_req = $_SESSION["username"];
        $request = $_POST['request'];;

        if (request($conn, $usr_req, $request)) {
            echo "<script type='text/javascript'>alert('$success');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$failed');</script>";
        }
    }
}
?>
