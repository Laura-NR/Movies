<?php 

/**
 * Delete user from the database
 */
function deleteFilm() {

    try {
        global $db;

        $sql = 'DELETE FROM movies WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        alert('Le film a bien été supprimé.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
    
};

function getAlreadyExist () {
	try {
		global $db;
		$sql = 'SELECT id FROM movies WHERE id = :id';
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

function countFilms() {
    global $db;

        $sql = 'SELECT COUNT(*) FROM movies';
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchColumn();
};
