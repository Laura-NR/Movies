<?php

$debug = true;

try {
    $db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    if ($_ENV['DEBUG']) {
        dump($e->getMessage());
    } else {
        echo 'Erreur de connection à la base de données';
        die;
    } 
};


