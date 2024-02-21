<?php

$db;

function getFilm() {

    global $db;
    try {
        $sql = 'SELECT * FROM movies WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
    
}

//Check if the email is already in the database
function checkAlreadyExistFilm(): mixed {

    global $db;
    
    $sql = 'SELECT * FROM movies WHERE title = :title';
    $query = $db->prepare($sql);
    $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
};

function formatBytes($size, $precision = 2) {
	$base     = log($size, 1024);
	$suffixes = ['', 'Ko', 'Mo', 'Go', 'To'];

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
};

function removeAccent($string) {
	$string = str_replace(
		['à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'], 
		['a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'], 
		$string
	);
	return $string;
};

function renameFile(string $name) {
	$name = trim($name);
	$name = strip_tags($name);
	$name = removeAccent($name);
    $name = preg_replace('/[\s-]+/', ' ', $name);  // Clean up multiple dashes and whitespaces
	$name = preg_replace('/[\s_]/', '-', $name); // Convert whitespaces and underscore to dash
	$name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
	$name = strtolower($name);
	$name = trim($name, '-');

	return $name;
};



function categoriesOptions() {
    global $db;

    try {
        $sql = 'SELECT * FROM categories';
        $query = $db->prepare($sql);
        $query->execute();

        $options = ''; // Initialize an empty string to hold the options

        $categories = $query->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array

        foreach ($categories as $option) {
            $options .= '<option value="' . $option['id'] . '">' . $option['name_category'] . '</option>';
        }

        return $options; // Return the generated options

    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
}

//Add a new film to the database
function addFilm(): bool {

    global $db;
    global $router;

    // File upload handling
    $uploadDirectory = "uploads/";  // Directory to store the uploaded files

    $uploadedFile = isset($_FILES['poster']) ? $_FILES['poster'] : null;

    $filename = isset($_FILES['poster']['name']) ? pathinfo($uploadedFile['name'], PATHINFO_FILENAME) : null;
    $filename = renameFile($filename);
    $extension = isset($_FILES['poster']['name']) ? pathinfo($uploadedFile['name'], PATHINFO_EXTENSION) : null;

    // Sanitize and generate a unique filename
    $base = $filename !== null ? preg_replace("/[^\w-]/", "_", $filename) : null;
    $filename = $base !== null ? $base . "." . $extension : null;

    $destination = $uploadDirectory . $filename;

    move_uploaded_file($uploadedFile['tmp_name'], $destination);

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
        $sql = 'INSERT INTO movies (id, title, note_press, date_release, duration, director, category, casting, synopsis, poster) 
                VALUES (UUID(), :title, :note_press, :date_release, :duration, :director, :category, :casting, :synopsis, :poster)';
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
                SET title = :title, note_press = :note_press, date_release = :date_release, duration = :duration, director = :director, category = :category, casting = :casting, synopsis = :synopsis, poster = :poster 
                WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

    return true;
};