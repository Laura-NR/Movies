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

        alert('L\'utilisateur a bien été supprimé.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
    
};

function getAlreadyExistId () {
	try {
		global $db;
		$sql = 'SELECT id FROM users WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute(['id' => $_GET['id']]);

		return $query->fetch();
	} catch (PDOException $e) {
		if ($_ENV['DEBUG'] == 'true') {
			dump($e->getMessage());
			die;
		} else {
			alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
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
