<?php

$errorsMessage = [
    'title' => false,
    'note' => false,
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

if (!empty($_FILES['poster']['tmp_name']) && file_exists($destination)) {
    $errorsMessage['poster'] = 'Il éxiste déjà un fichier avec ce nom';
}

// Check if the "poster" file is uploaded
/* if (!isset($_FILES['poster']) || $_FILES['poster']['error'] === UPLOAD_ERR_NO_FILE) {
    // Handle the case where no "poster" file is uploaded
    $errorsMessage['poster'] = 'Ce champs est obligatoire';
} */

if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] !== UPLOAD_ERR_OK) {

    switch ($_FILES["poster"]["error"]) {
        case UPLOAD_ERR_PARTIAL:
            exit('File only partially uploaded');
            break;
        case UPLOAD_ERR_NO_FILE:
            $errorsMessage['poster'] = 'Ce champs est obligatoire';
            break;
        case UPLOAD_ERR_EXTENSION:
            exit('File upload stopped by a PHP extension');
            break;
        case UPLOAD_ERR_FORM_SIZE:
            exit('File exceeds MAX_FILE_SIZE in the HTML form');
            break;
        case UPLOAD_ERR_INI_SIZE:
            exit('File exceeds upload_max_filesize in php.ini');
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            exit('Temporary folder not found');
            break;
        case UPLOAD_ERR_CANT_WRITE:
            exit('Failed to write file');
            break;
        default:
            exit('Unknown upload error');
            break;
    }
}

// Reject uploaded file larger than 5MB
if (isset($_FILES["poster"]["size"]) && $_FILES["poster"]["size"] > 5242880) {
    $errorsMessage['poster'] = 'File too large (max 5MB)';
}

// Use fileinfo to get the mime type
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = (isset($_FILES["poster"]["tmp_name"])) ? $finfo->file($_FILES["poster"]["tmp_name"]) : null;

$mime_types = ["image/gif", "image/png", "image/jpeg"];
        
if (isset($_FILES["poster"]["type"]) && !in_array($_FILES["poster"]["type"], $mime_types)) {
    exit("Invalid file type");
}

// Move the uploaded file to the destination folder
if (isset($uploadedFile) && !move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
    // If file move fails, handle the error (e.g., exit, return false, etc.)
    $errorsMessage['poster'] = 'Error lors du téléchargement du fichier';;
}

$globalMessage = ['class' => 'd-none', 'message' => false];
if (!empty($_POST['title']) && !empty($_POST['note']) && !empty($_POST['date_release']) && !empty($_POST['duration']) && !empty($_POST['director']) && !empty($_POST['category']) && !empty($_POST['casting']) && !empty($_POST['synopsis']) && !empty($_POST['poster'])) {
    if (!$errorsMessage['title'] && !$errorsMessage['note'] && !$errorsMessage['date_release'] && !$errorsMessage['duration'] && !$errorsMessage['director'] && !$errorsMessage['category'] && !$errorsMessage['casting'] && !$errorsMessage['synopsis'] && !$errorsMessage['poster']) {
        if (!empty($_GET['id'])) {
            updateFilm();
        } else {
            // Alert success
            addFilm();
        }
        alert('Un Film a été ajouté avec succes', 'success');
    } else {
        // Alert error
        alert('Error lors de l\'ajout du film', 'danger');
    }
} else {
    alert('Merci de remplir toutes les chemps obligatoires', 'danger');
}