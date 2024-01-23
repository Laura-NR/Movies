<?php

$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);
$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Users
$router->map( 'GET|POST', $admin . '/connexion', 'users/admin_login', '');
$router->map( 'GET', $admin . '/deconnexion', '', '');
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword');
$router->map( 'GET', $admin . '/utilisateurs', 'users/users_display', 'users');
$router->map( 'GET|POST', $admin . '/utilisateurs/ajouter/editer', 'users/admin_edit', 'addUser');
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[uui:id]', 'users/admin_edit', 'editUser');
$router->map( 'GET', $admin . '/utilisateurs/suprimer/[uui:id]', 'users/admin_delete', 'deleteUser');

// Films
$router->map( 'GET', $admin . '/films', '', 'listMovies');
$router->map( 'GET|POST', $admin . '/films/ajouter/editer', 'films/films_edit', '');
$router->map( 'GET|POST', $admin . '/films/editer/[i:id]', 'films/films_edit', '');
$router->map( 'GET', $admin . '/films/suprimer/[i:id]', '', '');

// Categories
$router->map( 'GET', $admin . '/categories', '', '');
$router->map( 'GET', $admin . '/categories/ajouter', '', '');
$router->map( 'GET', $admin . '/categories/editer/[i:id]', '', '');
$router->map( 'GET', $admin . '/categories/suprimer/[i:id]', '', '');