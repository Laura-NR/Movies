<?php

function getFilms() {

    global $db;

    $sql = 'SELECT id, title, date_release, duration, synopsis, casting, director, category, note_press FROM movies';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}