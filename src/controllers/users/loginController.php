<?php 

if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    $accessUser = checkUserAccess();
    if (checkUserAccess()) {
        $_SESSION['user'] = $accessUser;
        alert('Vous étes connecté', 'success');
        header('Location: ' . $router->generate('users'));
        die;
    } else {
        alert('Identifiants incorrects');
    }
};