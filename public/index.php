<?php

require '../vendor/autoload.php';

// Constants
define('SRC', '../src/');

//Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(SRC . 'config');
$dotenv->load();

session_start();

require SRC . 'config/database.php';
require SRC . 'includes/forms.php';
require SRC . 'includes/functions.php';

$router = new AltoRouter();

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

logoutTimer();


$router->map( 'GET', '/', 'home', 'home');

$match = $router->match();

if (!empty($match['target'])) {
    checkadmin($match, $router);

    $_GET = array_merge($_GET, $match['params']);
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';
    require SRC . 'views/' . $match['target'] . 'View.php';
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}

?>