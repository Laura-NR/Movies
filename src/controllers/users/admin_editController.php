<?php


$errorsMessage = [
    'email' => false,
    'pwd' => false,
    'pwdConfirm' => false,
];

if (!empty($_POST)) {
    
    if (!empty($_POST['email'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorsMessage['email'] = 'L\'adresse email n\'est pas valide';
        } else if (checkAlreadyExistEmail()) {
            $errorsMessage['email'] = 'L\'adresse email existe déjà';
        }
    };
    
    
    if (!empty($_POST['pwd'])) {
        $regEx = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
        if (preg_match($regEx,$_POST['pwd'])) {
            $errorsMessage['pwd'] = 'Merci de respecter le format indiqué';
        } else if ($_POST['pwd'] !== $_POST['pwdConfirm']) {
            $errorsMessage['pwdConfirm'] = 'Les mots de passe ne sont pas identiques';
        }
    };
    
    
    $globalMessage = ['class' => 'd-none', 'message' => false];
    if (!empty($_POST['email']) && !empty($_POST['email']) && !empty($_POST['pwdConfirm'])) {
        if (!$errorsMessage['email'] && !$errorsMessage['pwd'] && !$errorsMessage['pwdConfirm']) {
            if (!empty($_GET['id'])) {
                updateUser('Un utilisateur a été modifié avec succes');
            } else {
                // Alert success
                addUser('Un utilisateur a été ajouté avec succes');
            } 
            header('Location: ' . $router -> generate('users'));
            die;
        } else {
            // Alert error
            alert('Error lors de l\'ajout de l\'utilisateur', 'danger');
        }
    } else {
        alert('Merci de remplir toutes les champs obligatoires', 'danger');
    };

} else if (!empty($_GET['id'])) {
    $_POST = (array) getUser();
};