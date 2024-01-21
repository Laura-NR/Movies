<?php

$errorsMessage = [
    'title' => false,
    'note' => false,
    'date_release' => false,
    'duration' => false,
    'director' => false,
    'category' => false,
    'casting' => false,
    'synopsis' => false
];

if (!empty($_POST['title']) && checkAlreadyExistFilm()) {
    $errorsMessage['title'] = 'Cette film existe déjà dans la base de données';
};

$globalMessage = ['class' => 'd-none', 'message' => false];
if (!empty($_POST['title']) && !empty($_POST['note']) && !empty($_POST['date_release']) && !empty($_POST['duration']) && !empty($_POST['director']) && !empty($_POST['category']) && !empty($_POST['casting']) && !empty($_POST['synopsis'])) {
    if (!$errorsMessage['title'] && !$errorsMessage['note'] && !$errorsMessage['date_release'] && !$errorsMessage['duration'] && !$errorsMessage['director'] && !$errorsMessage['category'] && !$errorsMessage['casting'] && !$errorsMessage['synopsis']) {
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