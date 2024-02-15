<?php
 session_start();
include('../connection/koneksi.php');


$conn = getConnectionComments();
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$comment = $_POST['comments'];
$id_movie = $_POST['idMovie'];
$usr = $_SESSION["username"];

$sql = "INSERT INTO review (username, comment, id_movie)
VALUES ('$usr', '$comment', $id_movie)";
echo $sql;

if ($conn->query($sql) === TRUE) {
    header("Location: http://192.168.183.40/MovieProject/index/detail-movie-exec.php?id_movie=".$id_movie);
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>