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

function saveLastLogin(string $userId) {
    global $db;
    $sql = 'UPDATE users SET last_login = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute(['id' => $userId]);

    /* return $query->rowCount(); */
}


function limitAttemps()
{
    global $router;

    if (!empty($_SESSION['attemps']['time'])) {
        $date = new DateTimeImmutable();
        $now = $date->getTimestamp();
        $diff = $now - $_SESSION['attemps']['time'];

        if ($diff > 300) {
            unset($_SESSION['attemps']);
        } else {
            alert('Trop de tentatives, veuillez réessayer dans 5 minutes');
            header('Location: ' . $router->generate('home'));
            die;
        }
    } else {
        if (empty($_SESSION['attemps'])) {
            $_SESSION['attemps']['count'] = 1;
        } else if (!empty($_SESSION['attemps']['count']) && $_SESSION['attemps']['count'] < 5) {
            $_SESSION['attemps']['count']++;
        } else if ($_SESSION['attemps']['count'] >= 5) {
            $date = new DateTimeImmutable();
            $_SESSION['attemps']['time'] = $date->getTimestamp();
        }
    }
}


