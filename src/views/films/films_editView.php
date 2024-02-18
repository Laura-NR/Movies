<?php get_header('Editer un film', 'admin'); ?>

<style>
    h2 {
        margin-top: 50px;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    #submit_button_films {
        color: #F7B32B;
        background-color: #000623;
        padding: 5px 20px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
    }

    #logout_films {
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

<h2 class="mb-4">Ajouter un film</h2>

<form action="" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-9 mb-4">
            <?php $error = checkEmptyFields('title'); ?>
                <label for="title" class="form-label">Titre du film: *</label>
                <input type="text" id="title" name="title" value="<?= getValueField('title'); ?>" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorsMessage['title']; ?>
        </div>
        <div class="col-md-3 mb-4">
            <?php $error = checkEmptyFields('note_press'); ?>
                <label for="note_press" class="form-label">Note press: *</label>
                <input type="text" id="note_press" name="note_press" value="<?= getValueField('note_press'); ?>" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorsMessage['note_press']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col mb-4">
            <?php $error = checkEmptyFields('date_release'); ?>
                <label for="date_release" class="form-label">Date de sortie: *</label>
                <input type="date" id="date_release" name="date_release" value="<?= getValueField('date_release'); ?>" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorsMessage['date_release']; ?>
        </div>
        <div class="col mb-4">
            <?php $error = checkEmptyFields('duration'); ?>
                <label for="duration" class="form-label">Duration du Film: *</label>
                <input type="time" id="duration" name="duration" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorsMessage['duration']; ?>
        </div>
        <div class="col mb-4">
            <?php $error = checkEmptyFields('director'); ?>
                <label for="director" class="form-label">Réalisateur: *</label>
                <input type="text" id="director" name="director" value="<?= getValueField('director'); ?>" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorsMessage['director']; ?>
        </div>
        <div class="col mb-4">
            <?php $error = checkEmptyFields('category'); ?>
                <label for="category" class="form-label">Categorie: *</label>
                <select class="form-select <?= $error['class']; ?>" aria-label="Default select example" id="category" name="category">
                    <option selected> </option>
                    <?= categoriesOptions(); ?>
                </select>
            <?= $error['message']; ?>
            <?= $errorsMessage['category']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 mb-4">
            <?php $error = checkEmptyFields('casting'); ?>
                <label for="casting" class="form-label">Cast: *</label>
                <input type="text" id="casting" name="casting" value="<?= getValueField('casting'); ?>" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorsMessage['casting']; ?>
        </div>
        <div class="col-md-5 mb-4">
            <?php $error = checkEmptyFields('poster'); ?>
                <label for="poster" class="form-label">Affiche: *</label>
                <input type="file" id="poster" name="poster" class="form-control <?= $error['class']; ?>">
                <p class="form-text">Taille maximale du fichier: 5MB</p>
            <?= $error['message']; ?>
            <?= $errorsMessage['poster']; ?>
        </div>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('synopsis'); ?>
            <label for="synopsis" class="form-label">Description: *</label>
            <input type="text" id="synopsis" name="synopsis" value="<?= getValueField('synopsis'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['synopsis']; ?>
    </div>
    <div>
        <input type="submit" id="submit_button_films" value="Sauvegarder">
        <a href="<?= $router->generate('logout'); ?>" id="logout_films">Déconnexion</a>
    </div>
</form>

<?php get_footer('admin'); ?>