<?php

// Users
$router->map( 'GET', '/connexion', 'login', 'userLogin');
$router->map( 'GET', '/inscription', 'signUp', 'signUp');
$router->map( 'GET', '/deconnexion', 'logout', 'userLogout');
$router->map( 'GET', '/mot-de-passe-oublie', 'forgottenPassword');
$router->map( 'GET', '/profil', 'profile');

// Movies
$router->map( 'GET', '/', 'home', 'home');
$router->map( 'GET', '/details/[i:id]', 'filmDetails', 'filmDetails');
$router->map( 'GET', '/recherche', 'search');

// Pages
$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');

