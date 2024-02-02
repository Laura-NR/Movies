<?php

if (!empty($_GET['id']) && !empty(getAlreadyExistFilm()->id) && countFilms() > 1) {
       deleteFilm(); 
} else {
    alert('Impossible de suprimer ce film.', 'danger');
}

header('Location: ' . $router->generate('listMovies'));
die;