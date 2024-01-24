<?php 

if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    $accessUser = checkUserAccess();
    if (checkUserAccess()) {
        $_SESSION['user'] = [
            'id' => $accessUser,
            'last_login' => date('Y-m-d H:i:s')
        ];

        saveLastLogin($accessUser);

        alert('Vous étes connecté', 'success');
        header('Location: ' . $router->generate('users'));
        die;
    } else {
        alert('Identifiants incorrects');
    }
};