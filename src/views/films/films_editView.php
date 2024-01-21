<?php get_header('Editer un film', 'admin'); ?>

<h1 class="mb-4">Ajouter un film</h1>

<form action="" method="post" novalidate>
    <div class="row">
        <div class="col-md-9 mb-4">
        <?php $error = checkEmptyFields('title'); ?>
            <label for="title" class="form-label">Titre du film: *</label>
            <input type="text" id="title" name="title" value="<?= getValueField('title'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['title']; ?>
    </div>
    <div class="col-md-3 mb-4">
        <?php $error = checkEmptyFields('note'); ?>
            <label for="note" class="form-label">Note press: *</label>
            <input type="text" id="note" name="note" value="<?= getValueField('note'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['note']; ?>
    </div>
    </div>
    <div class="row">
        <div class="col mb-4">
            <?php $error = checkEmptyFields('date'); ?>
                <label for="date_release" class="form-label">Date de sortie: *</label>
                <input type="date" id="date_release" name="date_release" value="<?= getValueField('date'); ?>" class="form-control <?= $error['class']; ?>">
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
                    <option value="Science-Fiction">Science-Fiction</option>
                    <option value="Action">Action</option>
                    <option value="Horror">Horror</option>
                </select>
            <?= $error['message']; ?>
            <?= $errorsMessage['category']; ?>
        </div>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('casting'); ?>
            <label for="casting" class="form-label">Cast: *</label>
            <input type="text" id="casting" name="casting" value="<?= getValueField('casting'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['casting']; ?>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('synopsis'); ?>
            <label for="synopsis" class="form-label">Description: *</label>
            <input type="text" id="synopsis" name="synopsis" value="<?= getValueField('synopsis'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorsMessage['synopsis']; ?>
    </div>
    <div>
        <input type="submit" class="btn btn-success mb-5" value="Sauvegarder">
    </div>
</form>

<?php get_footer('admin'); ?>