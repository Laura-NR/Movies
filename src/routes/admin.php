<?php

$admin = '/' . $_ENV['ADMIN_FOLDER'];

//Add format params
$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);
$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Users
$router->map( 'GET|POST', $admin . '/connexion', 'users/login', 'login');
$router->map( 'GET|POST', $admin . '/deconnexion', 'users/admin_logout', 'logout');
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword');
$router->map( 'GET', $admin . '/utilisateurs', 'users/users_display', 'users');
$router->map( 'GET|POST', $admin . '/utilisateurs/ajouter/editer', 'users/admin_edit', 'addUser');
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[uuid:id]', 'users/admin_edit', 'editUser');
$router->map( 'GET|POST', $admin . '/utilisateurs/supprimer/[uuid:id]', 'users/admin_delete', 'deleteUser');

// Films
$router->map( 'GET', $admin . '/films', 'films/films_display', 'listMovies');
$router->map( 'GET|POST', $admin . '/films/ajouter/editer', 'films/films_edit', 'addFilm');
$router->map( 'GET|POST', $admin . '/films/editer/[uuid:id]', 'films/films_edit', 'editFilm');
$router->map( 'GET|POST', $admin . '/films/supprimer/[uuid:id]', 'films/films_delete', 'deleteFilm');

// Categories
$router->map( 'GET', $admin . '/categories', '', '');
$router->map( 'GET', $admin . '/categories/ajouter', '', '');
$router->map( 'GET', $admin . '/categories/editer/[i:id]', '', '');
$router->map( 'GET', $admin . '/categories/supprimer/[i:id]', '', '');