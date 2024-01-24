<?php 

function checkUserAccess() {

    global $db;
    $sql = 'SELECT id, pwd FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->execute(['email' => $_POST['email']]);

    $user = $query->fetch();

    if (password_verify($_POST['pwd'], $user->pwd)) {
        return $user->id;
    }else {
        return false;
    };
    
}

