<?php

unset($_SESSION['user']);
alert('Vous étes déconnecté', 'success');
header('Location: ' . $router->generate('login'));
die;