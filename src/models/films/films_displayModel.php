<?php

function getFilms() {

    global $db;

    $sql = 'SELECT title, date_release, duration, synopsis, casting, director, category, note_press FROM movies';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}