<?php get_header('Liste des utilisateurs', 'admin'); ?>

<h2>Liste des utilisateurs</h2>

<a href="<?= $router->generate('addUser'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td class="align-middle"><?= $user->email; ?></td>
                <td class="d-flex justify-content-end align-middle">
                    <a href="<?= $router->generate('editUser', ['id' => $user->id]); ?>" class="btn btn-warning me-2">Editer</a>
                    <a href="<?= $router->generate('deleteUser', ['id' => $user->id]); ?>" class="btn btn-danger me-2">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>