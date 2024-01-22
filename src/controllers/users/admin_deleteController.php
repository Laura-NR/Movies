<?php

if (!empty($_GET['id']) && !empty(checkAlreadyExistEmail()->id) && countUsers() > 1) {
       deleteUser(); 
       
} else {
    alert('Impossible de suprimer cet utilisateur.', 'danger');
    header('Location: ' . $router->generate('users'));
    die;
};

