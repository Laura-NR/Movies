<?php 

$db;

function getCategory() {

    global $db;
    try {
        $sql = 'SELECT * FROM categories WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
    
}

//Check if the category is already in the database
function checkAlreadyExistCategory(): mixed {

    global $db;

    if (!empty($_GET['id'])) {
        $category = getCategory()->name_category;

        if ($category === $_POST['name_cat']) {
            return false;
        }
    }
    
    
    $sql = 'SELECT * FROM categories WHERE name_category = :name_category';
    $query = $db->prepare($sql);
    $query->bindParam(':name_category', $_POST['name_cat'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
};


//Add a new category to the database
function addCategory() {

    global $db;

    $data = [
        'name_category' => $_POST['name_cat']
    ];

    try {
        $sql = 'INSERT INTO categories (name_category) VALUES (:name_category)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une categorie a été ajouté avec success', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }
};


//Modify a category in the database
function updateCategory(): bool {

    global $db;

    $data = [
        'name_category' => $_POST['name_cat'],
        'id' => $_GET['id']
    ];
    print_r($data);

    try {
        $sql = 'UPDATE categories SET name_category = :name_category, modified = NOW() WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une categorie a été modifié avec success', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert ('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        } 
    }

    return true;
};

