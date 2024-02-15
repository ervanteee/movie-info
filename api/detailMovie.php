<?php
ini_set('display_errors', 0);
$id_movie = $_GET['id_movie'];
$api_key = '1d48fe8fffd3b67219df75fc9ba3b85c';
$api_url = "https://api.themoviedb.org/3/movie/$id_movie?api_key=$api_key";

// Make API request
$response = file_get_contents($api_url);

// Check for errors
if ($response === false) {
    die('Error fetching data from TMDb API');
}

// Decode JSON response
$data = json_decode($response, true);

// Extract and display movie information
$movies = $data;
echo json_encode($movies);
/* foreach ($movies as $movie) {
    echo '<h2>' . $movie['title'] . '</h2>';
    echo '<p>Release Date: ' . $movie['release_date'] . '</p>';
    echo '<img src="https://image.tmdb.org/t/p/w500' . $movie['poster_path'] . '" alt="' . $movie['title'] . ' Poster">';
    echo '<hr>';
} */
?>
