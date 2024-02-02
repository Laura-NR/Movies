<?php get_header('Editer une categorie', 'admin'); ?>

<style>
    h2 {
        margin-top: 50px;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    #submit_button {
        color: #F7B32B;
        background-color: #000623;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
    }

    #logout_categories {
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
</style>

<h2>Editer une categorie</h2>

<form action="" method="post" novalidate>
    <div class="mb-4">
        <?php $error = checkEmptyFields('category'); ?>
            <label for="name_cat" class="form-label">Nom du categorie: *</label>
            <input type="text" id="name_cat" name="name_cat" value="<?= getValueField('category'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['name_category']; ?>
    </div>
    <div>
        <input type="submit" value="Sauvegarder" id="submit_button">
        <a href="<?= $router->generate('logout'); ?>" id="logout_categories">Déconnexion</a>
    </div>
</form>

<?php get_footer('admin'); ?>