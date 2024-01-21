<?php 

$db;

//Check if the email is already in the database
function checkAlreadyExistEmail(): mixed {

    global $db;
    
    $sql = 'SELECT * FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
};


//Add a new user to the database
function addUser(): bool {

    global $db;

    $data = [
        'email' => $_POST['email'],
        'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
        'role_id' => 1
    ];

    try {
        $sql = 'INSERT INTO users (email, pwd, role_id) VALUES (:email, :pwd, :role_id)';
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

    return true;
};


//Modify a user in the database
function updateUser(): bool {

    global $db;

    $data = [
        'email' => $_POST['email'],
        'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
        'role_id' => $_GET['id']
    ];

    try {
        $sql = 'UPDATE users SET email = :email, pwd = :pwd WHERE role_id = :role_id';
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

    return true;
};