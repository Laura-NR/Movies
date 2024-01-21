<?php get_header('Editer un utilisateur', 'admin'); ?>


<h1 class="mb-4">Editer un utilisateur</h1>

<form action="" method="post" novalidate>
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?>
            <label for="email" class="form-label">Adresse email: *</label>
            <input type="email" id="email" name="email" value="<?= getValueField('email'); ?>" class="form-control <?= $error['class']; ?>">
            <p class="invalid-feedback">Message</p>
        <?= $error['message']; ?>
        <?= $errorsMessage['email']; ?>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?>
            <label for="pwd" class="form-label">Mot de passe: *</label>
            <input type="password" id="pwd" name="pwd" value="<?= getValueField('pwd'); ?>" class="form-control <?= $error['class']; ?>">
            <p class="form-text mb-0">Règles de mot de passe</p>
            <p class="invalid-feedback">Message</p>
        <?= $error['message']; ?>
        <?= $errorsMessage['pwd']; ?>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?>
            <label for="pwdConfirm" class="form-label">Confirmation du mot de passe: *</label>
            <input type="password" id="pwdConfirm" name="pwdConfirm" value="<?= getValueField('pwdConfirm'); ?>" class="form-control <?= $error['class']; ?>">
            <p class="invalid-feedback">Message</p>
        <?= $error['message']; ?>
        <?= $errorsMessage['pwdConfirm']; ?>
    </div>
    <div>
        <input type="submit" class="btn btn-success mb-5" value="Sauvegarder">
    </div>
</form>

<?php get_footer('admin'); ?>