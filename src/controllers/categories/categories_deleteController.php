<?php

if (!empty($_GET['id']) && !empty(getAlreadyExistCategory()->id) && countCategories() > 1) {
       deleteCategory(); 
} else {
    alert('Impossible de suprimer cette categorie.', 'danger');
}

header('Location: ' . $router->generate('listCategories'));
die;