<?php
require_once('../connection/koneksi.php');
$conn = getConnection();

// Function to sanitize user inputs
function sanitizeInput($input)
{
    return trim($input); // Only trim, htmlspecialchars should be used when displaying data
}

// Function to delete admin data
function deleteComment($conn, $id)
{
    $sql = "DELETE FROM review WHERE Id=$id";
    return $conn->query($sql);
}

$success = "Admin data updated successfully.";
$failed = "Error updating data.";

// Check if the form for update, delete, or add is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        if (deleteComment($conn, $id)) {
            echo "<script type='text/javascript'>alert('$success');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$failed');</script>";
        }
    } 
}
?>
