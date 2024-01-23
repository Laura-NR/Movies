<?php get_header('Liste des films', 'admin'); ?>

<h2>Liste des films</h2>

<a href="<?= $router->generate('addFilm'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Date de sortie</th>
            <th scope="col">Duration</th>
            <th scope="col">Cast</th>
            <th scope="col">Réalisateur</th>
            <th scope="col">Categorie</th>
            <th scope="col">Description</th>
            <th scope="col">Note</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($films as $film) { ?>
            <tr>
                <td class="align-middle"><?= $film->title; ?></td>
                <td class="align-middle"><?= $film->date_release; ?></td>
                <td class="align-middle"><?= $film->duration; ?></td>
                <td class="align-middle"><?= $film->casting; ?></td>
                <td class="align-middle"><?= $film->director; ?></td>
                <td class="align-middle"><?= $film->category; ?></td>
                <td class="align-middle"><?= $film->synopsis; ?></td>
                <td class="align-middle"><?= $film->note_press; ?></td>
                <td class="text-center align-middle">
                    <a href="<?= $router->generate('editUser', ['id' => $film->id]); ?>" class="btn btn-warning">Editer</a>
                    <a href="<?= $router->generate('deleteUser', ['id' =>  $film->id]); ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>