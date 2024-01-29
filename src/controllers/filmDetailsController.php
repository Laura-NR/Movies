<?php 

$movie = getFilms();

if ($movie) {
	$data['movie'] = $movie;
} else {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	die('404 - Page not found');
}