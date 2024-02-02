<?php

$errorsMessage = [
    'name_category' => false
];

if (!empty($_POST['name_cat']) && checkAlreadyExistCategory()) {
    $errorsMessage['title'] = 'Cette categorie existe déjà dans la base de données';
};

if (!empty($_POST)) {

    $globalMessage = ['class' => 'd-none', 'message' => false];
    if (!empty($_POST['name_cat'])) {
        if (!$errorsMessage['name_category']) {
            if (!empty($_GET['id'])) {
                alert('Une categorie a été modifié avec succes', 'success');
                updateCategory();
            } else {
                // Alert success
                alert('Une categorie a été ajouté avec succes', 'success');
                addCategory();
            }
            header('Location: ' . $router -> generate('listCategories'));
            die;
        } else {
            // Alert error
            alert('Error lors de l\'ajout de la categorie', 'danger');
        }
    } else {
        alert('Merci de remplir toutes les champs obligatoires', 'danger');
    };

} else if (!empty($_GET['id'])) {
    $_POST = (array) getCategory();
};