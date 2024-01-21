<?php

$admin = '/' . $_ENV['ADMIN_FOLDER'];

// Users
$router->map( 'GET|POST', $admin . '/connexion', 'users/admin_login', '');
$router->map( 'GET', $admin . '/deconnexion', '', '');
$router->map( 'GET', $admin . '/mot-de-passe-oublie', 'lostPassword', '');
$router->map( 'GET', $admin . '/utilisateurs', '', '');
$router->map( 'GET|POST', $admin . '/utilisateurs/ajouter/editer', 'users/admin_edit', '');
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[i:id]', 'users/admin_edit', '');
$router->map( 'GET', $admin . '/utilisateurs/suprimer/[i:id]', '', '');

// Films
$router->map( 'GET', $admin . '/films', '', '');
$router->map( 'GET|POST', $admin . '/films/ajouter/editer', 'films/films_edit', '');
$router->map( 'GET|POST', $admin . '/films/editer/[i:id]', 'films/films_edit', '');
$router->map( 'GET', $admin . '/films/suprimer/[i:id]', '', '');

// Categories
$router->map( 'GET', $admin . '/categories', '', '');
$router->map( 'GET', $admin . '/categories/ajouter', '', '');
$router->map( 'GET', $admin . '/categories/editer/[i:id]', '', '');
$router->map( 'GET', $admin . '/categories/suprimer/[i:id]', '', '');