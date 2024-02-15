<?php
	
	$id_movie = $_GET['id_movie'];
	$response ["data"] = array();
	
	require_once('../connection/koneksi.php');
    $conn = getConnectionComments();
	$sql = "SELECT * FROM review WHERE id_movie='$id_movie'";

	$r = mysqli_query($conn,$sql);
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
	while ($row=mysqli_fetch_assoc($result)){
        $data = array();
        $data["id_movie"] = $row["id_movie"];
        $data["comment"] = $row["comment"];
        $data["username"] = $row["username"];
        // push single units into final response array
        array_push($response["data"], $data);
        $response["success"] = 1;
	}
	
	echo json_encode($response);
	
	mysqli_close($conn);
?>
