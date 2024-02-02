<?php get_header('Liste des films', 'admin'); ?>

<style>
    .wrapper_films {
        max-width: 1300px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .wrapper_films h2 {
        margin-top: 60px;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .wrapper_films #add_button {
        text-decoration: none;
        color: #F7B32B;
        background-color: #000623;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
    }

    .wrapper_films #logout {
        text-decoration: none;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        background-color: red;
        color: white;
        float: right;
    }

    .wrapper_films table {
        margin-top: 25px;
        width: 100%;
    }

    .wrapper_films table thead {
        font-size: 20px;
        font-weight: 500;
    }

    .wrapper_films table tr {
        height: 32px;
        text-align: center;
        border-bottom: 2px solid #F7B32B;
    }

    .wrapper_films table tr th {
        background-color: #F7B32B;
        padding-top: 5px;
    }

    .wrapper_films table tr td {
        padding-top: 5px;
        border-right: 2px solid #F7B32B;
    }

    .wrapper_films table tr #links {
        border: none;
    }

    .wrapper_films table tr td a img {
        height: 20px;
        width: auto;
        margin-left: 18px;
    }
</style>

<div class="wrapper_films">
    <h2>Liste des films</h2>

    <a href="<?= $router->generate('addFilm'); ?>" id="add_button">Ajouter +</a>
    <a href="<?= $router->generate('logout'); ?>" id="logout">Déconnexion</a>

    <table>
        <thead>
            <tr>
                <th style="width: 12%;">Titre</th>
                <th style="width: 9%;">Date de sortie</th>
                <th style="width: 8%;">Duration</th>
                <th style="width: 15%;">Cast</th>
                <th style="width: 10%;">Réalisateur</th>
                <th style="width: 9%;">Categorie</th>
                <th style="width: 20%;">Description</th>
                <th style="width: 9%;">Note</th>
                <th style="width: 9%;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film) { ?>
                <tr>
                    <td style="width: 12%;"><?= $film->title; ?></td>
                    <td style="width: 9%;"><?= $film->date_release; ?></td>
                    <td style="width: 8%;"><?= $film->duration; ?></td>
                    <td style="width: 15%;"><?= $film->casting; ?></td>
                    <td style="width: 10%;"><?= $film->director; ?></td>
                    <td style="width: 9%;"><?= $film->category; ?></td>
                    <td style="width: 20%;"><?= $film->synopsis; ?></td>
                    <td style="width: 9%;"><?= $film->note_press; ?></td>
                    <td style="width: 9%;" id="links">
                        <a href="<?= $router->generate('editFilm', ['id' => $film->id]); ?>"><img src="/public/images/edit-pencil-line-01-svgrepo-com.svg" alt="Edit pencil icon"></a>
                        <a href="<?= $router->generate('deleteFilm', ['id' =>  $film->id]); ?>"><img src="/public/images/trash.svg" alt="Trash can icon" id="trash"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php get_footer('admin'); ?>