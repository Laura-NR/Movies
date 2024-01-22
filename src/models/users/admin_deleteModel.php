<?php 

/**
 * Delete user from the database
 */
function deleteUser() {

    try {
        global $db;

        $sql = 'DELETE FROM users WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetchAll();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
    
};

function countUsers() {
    global $db;

        $sql = 'SELECT COUNT(*) FROM users';
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchColumn();
};
countUsers();