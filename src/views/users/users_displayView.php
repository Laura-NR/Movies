<?php get_header('Liste des utilisateurs', 'admin'); ?>

<style>
    .wrapper_users {
        max-width: 1000px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .wrapper_users h2 {
        margin-top: 60px;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .wrapper_users #add_button_users {
        text-decoration: none;
        color: #F7B32B;
        background-color: #000623;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
    }

    .wrapper_users #logout_users {
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

    .wrapper_users table {
        margin-top: 25px;
        width: 100%;
    }

    .wrapper_users table {
        margin-top: 25px;
        width: 100%;
    }

    .wrapper_users table thead {
        font-size: 20px;
        font-weight: 500;
    }

    .wrapper_users table tr {
        height: 32px;
        text-align: center;
        border-bottom: 2px solid #F7B32B;
    }

    .wrapper_users table tr th {
        background-color: #F7B32B;
        padding-top: 5px;
    }

    .wrapper_users table tr td {
        padding-top: 5px;
        border-right: 2px solid #F7B32B;
    }

    .wrapper_users table tr #links_users {
        border: none;
    }

    .wrapper_users table tr td a img {
        height: 20px;
        width: auto;
        margin-left: 18px;
    }  
</style>

<div class="wrapper_users">
    <h2>Liste des utilisateurs</h2>
    <!--Generate link to "addUser" and "logout"-->
    <a href="<?= $router->generate('addUser'); ?>" id="add_button_users">Ajouter +</a>
    <a href="<?= $router->generate('logout'); ?>" id="logout_users">Déconnexion</a>

    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through each user in the database to show in table -->
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td style="width: 75%;"><?= $user->email; ?></td>
                    <td id="links_users" style="width: 20%;">
                        <!--Generate links to edit and delete users -->
                        <a href="<?= $router->generate('editUser', ['id' => $user->id]); ?>"><img src="/public/images/edit-pencil-line-01-svgrepo-com.svg" alt=""></a>
                        <a href="<?= $router->generate('deleteUser', ['id' => $user->id]); ?>"><img src="/public/images/trash.svg" alt=""></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php get_footer('admin'); ?>