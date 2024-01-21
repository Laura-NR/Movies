<?php

$db;

//Check if the email is already in the database
function checkAlreadyExistFilm(): mixed {

    global $db;
    
    $sql = 'SELECT * FROM movies WHERE title = :title';
    $query = $db->prepare($sql);
    $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
};

//Add a new film to the database
function addFilm(): bool {

    global $db;

    $data = [
        'title' => $_POST['title'],
        'note_press' => $_POST['note'],
        'date_release' => $_POST['date_release'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'category' => $_POST['category'],
        'casting' => $_POST['casting'],
        'synopsis' => $_POST['synopsis']
    ];

    try {
        $sql = 'INSERT INTO movies (title, note_press, date_release, duration, director, category, casting, synopsis) 
                VALUES (:title, :note_press, :date_release, :duration, :director, :category, :casting, :synopsis)';
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
    }

    return true;
};

//Modify a user in the database
function updateFilm(): bool {

    global $db;

    $data = [
        'title' => $_POST['title'],
        'note_press' => $_POST['note'],
        'date_release' => $_POST['date_release'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'category' => $_POST['category'],
        'casting' => $_POST['casting'],
        'synopsis' => $_POST['synopsis'],
        'id' => $_GET['id']
    ];

    try {
        $sql = 'UPDATE movies 
                SET title = :title, note_press = :note_press, date_release = :date_release, duration = :duration, director = :director, category = :category, casting = :casting, synopsis = :synopsis 
                WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

    return true;
};