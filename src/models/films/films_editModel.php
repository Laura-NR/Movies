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


    // File upload handling
    $uploadDirectory = __DIR__ . "/uploads/";  // Directory to store the uploaded files

    $uploadedFile = isset($_FILES['poster']) ? $_FILES['poster'] : null;

    $filename = isset($_FILES['poster']['name']) ? pathinfo($uploadedFile['name'], PATHINFO_FILENAME) : null;
    $extension = isset($_FILES['poster']['name']) ? pathinfo($uploadedFile['name'], PATHINFO_EXTENSION) : null;

    // Sanitize and generate a unique filename
    $base = $filename !== null ? preg_replace("/[^\w-]/", "_", $filename) : null;
    $filename = $base !== null ? $base . "." . $extension : null;

    $destination = $uploadDirectory . $filename;

    print_r($_FILES);
    print_r($uploadedFile);
    print_r($filename);
    print_r($extension);
    print_r($base);
    print_r($destination);

    $data = [
        'title' => $_POST['title'],
        'note_press' => $_POST['note_press'],
        'date_release' => $_POST['date_release'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'category' => $_POST['category'],
        'casting' => $_POST['casting'],
        'synopsis' => $_POST['synopsis'],
        'poster' => $destination
    ];


    try {
        $sql = 'INSERT INTO movies (title, note_press, date_release, duration, director, category, casting, synopsis, poster) 
                VALUES (:title, :note_press, :date_release, :duration, :director, :category, :casting, :synopsis, :poster)';
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
        'note_press' => $_POST['note_press'],
        'date_release' => $_POST['date_release'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'category' => $_POST['category'],
        'casting' => $_POST['casting'],
        'synopsis' => $_POST['synopsis'],
        'poster' => $_FILES['poster'],
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