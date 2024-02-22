<?php get_header('Editer un utilisateur', 'admin'); ?>

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

    #logout_usersedit {
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


<h2>Editer un utilisateur</h2>

<form action="" method="post" novalidate>
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?> <!--Function to very if field is empty-->
            <label for="email" class="form-label">Adresse email: *</label>
            <input type="email" id="email" name="email" value="<?= getValueField('email'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?> <!--Call to function to display error messages-->
        <?= $errorsMessage['email']; ?> <!--Function to display error messages specific to email-->
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?>
            <label for="pwd" class="form-label">Mot de passe: *</label>
            <input type="password" id="pwd" name="pwd" value="<?= getValueField('pwd'); ?>" class="form-control <?= $error['class']; ?>">
            <p class="form-text mb-0">Règles de mot de passe</p>
        <?= $error['message']; ?>
        <?= $errorsMessage['pwd']; ?> <!--Function to display error messages specific to pwd-->
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?>
            <label for="pwdConfirm" class="form-label">Confirmation du mot de passe: *</label>
            <input type="password" id="pwdConfirm" name="pwdConfirm" value="<?= getValueField('pwdConfirm'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['pwdConfirm']; ?> <!--Function to display error messages specific to pwdConfirm-->
    </div>
    <div>
        <input type="submit" value="Sauvegarder" id="submit_button">
        <a href="<?= $router->generate('logout'); ?>" id="logout_usersedit">Déconnexion</a>
    </div>
</form>

<?php get_footer('admin'); ?>