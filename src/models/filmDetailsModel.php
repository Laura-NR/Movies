<?php 

//Get movies from database according to slug
function getMovies() {

    global $db;

    $sql = 'SELECT * FROM movies WHERE slug = :slug';
    $query = $db->prepare($sql);
    $query->execute(['slug' => $_GET['slug']]);

    return $query->fetch();
}