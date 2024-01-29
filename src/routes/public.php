<?php

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

// Users
$router->map( 'GET', '/connexion', 'login', 'userLogin');
$router->map( 'GET', '/inscription', 'signUp', 'signUp');
$router->map( 'GET', '/deconnexion', 'logout', 'userLogout');
$router->map( 'GET', '/mot-de-passe-oublie', 'forgottenPassword');
$router->map( 'GET', '/profil', 'profile');

// Movies
$router->map( 'GET', '/', 'home', 'home');
$router->map( 'GET', '/film/[slug:slug]', 'filmDetails', 'details');
$router->map( 'GET', '/recherche', 'search');

// Pages
$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');

