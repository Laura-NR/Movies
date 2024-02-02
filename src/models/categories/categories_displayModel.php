<?php

function getCategories() {

    global $db;

    $sql = 'SELECT id, name_category FROM categories';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}