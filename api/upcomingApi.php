<?php
ini_set('display_errors', 0);
$api_key = '1d48fe8fffd3b67219df75fc9ba3b85c';
$api_url = "https://api.themoviedb.org/3/movie/upcoming?api_key=$api_key";


// Make API request
$response = file_get_contents($api_url);

// Check for errors
if ($response === false) {
    die('Error fetching data from TMDb API');
}

// Decode JSON response
$data = json_decode($response, true);

// Extract and display movie information
$movies = $data['results'];
echo json_encode($movies);

?>
