<?php 

/**
 * Delete category from the database
 */
function deleteCategory() {

    try {
        global $db;

        $sql = 'DELETE FROM categories WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        alert('La categorie a bien été supprimé.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
    
};

function getAlreadyExistCategory () {
	try {
		global $db;
		$sql = 'SELECT id FROM categories WHERE id = :id';
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

function countCategories() {
    global $db;

        $sql = 'SELECT COUNT(*) FROM categories';
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchColumn();
};
