<?php

$errorsMessage = [
    'title' => false,
    'note_press' => false,
    'date_release' => false,
    'duration' => false,
    'director' => false,
    'category' => false,
    'casting' => false,
    'synopsis' => false,
    'poster' =>false
];

if (!empty($_POST['title']) && checkAlreadyExistFilm()) {
    $errorsMessage['title'] = 'Cette film existe déjà dans la base de données';
};

if (isset($_FILES['poster']['tmp_name']) && !empty($_FILES['poster']['tmp_name']) && isset($destination) && file_exists($destination)) {
    $errorsMessage['poster'] = 'Il éxiste déjà un fichier avec ce nom';
}

if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] !== UPLOAD_ERR_OK) {

    switch ($_FILES["poster"]["error"]) {
        case UPLOAD_ERR_PARTIAL:
            $errorsMessage['poster'] = 'File only partially uploaded';
            break;
        case UPLOAD_ERR_NO_FILE:
            $errorsMessage['poster'] = 'Ce champs est obligatoire';
            break;
        case UPLOAD_ERR_EXTENSION:
            $errorsMessage['poster'] = 'File upload stopped by a PHP extension';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $errorsMessage['poster'] = 'File exceeds MAX_FILE_SIZE in the HTML form';
            break;
        case UPLOAD_ERR_INI_SIZE:
            $errorsMessage['poster'] = 'File exceeds upload_max_filesize in php.ini';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $errorsMessage['poster'] = 'Temporary folder not found';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $errorsMessage['poster'] = 'Failed to write file';
            break;
        default:
            $errorsMessage['poster'] = 'Unknown upload error';
            break;
    }
}

// Reject uploaded file larger than 5MB
if (isset($_FILES["poster"]["size"]) && $_FILES["poster"]["size"] > 5242880) {
    $errorsMessage['poster'] = 'File too large (max  ' . formatbytes(5242880) . ')';
}

//Reject file name larger than 50 characters
if (isset($_FILES['poster'])) {
    $name = $_FILES['poster']['name'];
    $maxNameLength = 50;
    if (strlen($name) > $maxNameLength) {
        $errorsMessage['poster'] = 'Nom du fichier trop long';
    }
}


// Use fileinfo to get the mime type
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = (isset($_FILES["poster"]["tmp_name"])) && !empty($_FILES["poster"]["tmp_name"]) ? $finfo->file($_FILES["poster"]["tmp_name"]) : null;

$mime_types = ["image/jpg", "image/png", "image/jpeg"];
        
if (isset($_FILES["poster"]["type"]) && !in_array($_FILES["poster"]["type"], $mime_types)) {
    exit("Invalid file type");
}

// Move the uploaded file to the destination folder
if (isset($uploadedFile) && !move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
    // If file move fails, handle the error (e.g., exit, return false, etc.)
    $errorsMessage['poster'] = 'Error lors du téléchargement du fichier';;
}

if (!empty($_POST)) {

    $globalMessage = ['class' => 'd-none', 'message' => false];
    if (!empty($_POST['title']) && !empty($_POST['note_press']) && !empty($_POST['date_release']) && !empty($_POST['duration']) && 
        !empty($_POST['director']) && !empty($_POST['category']) && !empty($_POST['casting']) && !empty($_POST['synopsis']) && !empty($_FILES['poster'])) {
        if (!$errorsMessage['title'] && !$errorsMessage['note_press'] && !$errorsMessage['date_release'] && !$errorsMessage['duration'] && 
            !$errorsMessage['director'] && !$errorsMessage['category'] && !$errorsMessage['casting'] && !$errorsMessage['synopsis'] && !$errorsMessage['poster']) {
            if (!empty($_GET['id'])) {
                alert('Un film a été modifié avec succes', 'success');
                updateFilm();
            } else {
                // Alert success
                alert('Un film a été ajouté avec succes', 'success');
                addFilm();
            }
            header('Location: ' . $router -> generate('listMovies'));
            die;
        } else {
            // Alert error
            alert('Error lors de l\'ajout du film', 'danger');
        }
    } else {
        alert('Merci de remplir toutes les chemps obligatoires', 'danger');
    };

} else if (!empty($_GET['id'])) {
    $_POST = (array) getFilm();
};
