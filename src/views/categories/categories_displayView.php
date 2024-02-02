<?php get_header('Liste des categories', 'admin'); ?>

<style>
    .wrapper_categories {
        max-width: 1000px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .wrapper_categories h2 {
        margin-top: 60px;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .wrapper_categories #add_button_categories {
        text-decoration: none;
        color: #F7B32B;
        background-color: #000623;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
    }

    .wrapper_categories #logout_categories {
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

    .wrapper_categories table {
        margin-top: 25px;
        width: 100%;
    }

    .wrapper_categories table {
        margin-top: 25px;
        width: 100%;
    }

    .wrapper_categories table thead {
        font-size: 20px;
        font-weight: 500;
    }

    .wrapper_categories table tr {
        height: 32px;
        text-align: center;
        border-bottom: 2px solid #F7B32B;
    }

    .wrapper_categories table tr th {
        background-color: #F7B32B;
        padding-top: 5px;
    }

    .wrapper_categories table tr td {
        padding-top: 5px;
        border-right: 2px solid #F7B32B;
    }

    .wrapper_categories table tr #links_categories {
        border: none;
    }

    .wrapper_categories table tr td a img {
        height: 20px;
        width: auto;
        margin-left: 18px;
    }  
</style>

<div class="wrapper_categories">
    <h2>Liste des Categories</h2>

    <a href="<?= $router->generate('addCategory'); ?>" id="add_button_categories">Ajouter +</a>
    <a href="<?= $router->generate('logout'); ?>" id="logout_categories">Déconnexion</a>

    <table>
        <thead>
            <tr>
                <th>Categories</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td style="width: 75%;"><?= $category->name_category; ?></td>
                    <td id="links_categories" style="width: 20%;">
                        <a href="<?= $router->generate('editCategory', ['id' => $category->id]); ?>"><img src="/public/images/edit-pencil-line-01-svgrepo-com.svg" alt=""></a>
                        <a href="<?= $router->generate('deleteCategory', ['id' => $category->id]); ?>"><img src="/public/images/trash.svg" alt=""></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php get_footer('admin'); ?>