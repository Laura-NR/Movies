<?php
/**
 * Get all movies ordered by added date
 */
function getMovies() {

    global $db;
    $sql = 'SELECT slug, title, poster FROM movies ORDER BY created DESC';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}