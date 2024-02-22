<?php get_header('Se connecter', 'login'); ?>

<style>
	html,
	body,
	.vertical-center {
		height: 100%;
        width: 380px;
        height: 500px;
        display: flex;
        flex-direction: column;
        margin-left: auto;
        margin-right: auto;
	}

    .container {
        background-color: #060623;
        margin-top: 30px;
        border-radius: 22px;
        text-align: center;
        box-shadow: 10px 10px 10px 0px #F7B32B;
    }

    .logo {
        margin-left: auto;
        margin-right: auto;
    }

    .logo img {
       width: 280px;   
       object-fit: cover;  
    }

	.form-signin {
		max-width: 330px;
		padding: 1rem;
	}

    .form-signin h1 {
        color: #F7B32B;
        text-transform: uppercase;
        margin-top: 15px;
    }

    .form-floating {
        margin-top: 20px;
    }

	.form-signin .form-floating:focus-within {
		z-index: 2;
	}

    .inputField {
        width: 300px;
        height: 45px;
        border-radius: 22px;
        background-color: #F7B32B;
        margin-top: 50px;
        border: 1px solid #F7B32B;
    }

    .inputField::placeholder {
        color: #060623;
        text-indent: 10px;
    }

    .container label {
        color: #F7B32B;
    }

    .connect {
        width: 180px;
        height: 40px;
        border-radius: 22px;
        color: #060623;
        font-weight: 600;
        text-transform: uppercase;
        background-color: #F7B32B;
        margin-top: 40px;
        border: 1px solid #F7B32B;
    }

    .connect:hover,
    .connect:focus {
        opacity: 0.8;
    }

    a {
        color:#F7B32B;
        text-decoration: none;
    }
</style>

<div class="py-4 vertical-center">
    <div class="logo"><img src="../../../public/images/mixxcinema-high-resolution-logo-transparent (1) (1).svg" alt=""></div>
    <div class="container">
        <form action="" method="post" class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Authentification</h1>
            <div class="form-floating">
                <?php $error = checkEmptyFields('email'); ?> <!--Function to very if field is empty-->
                <input type="email" name="email" class="inputField <?= $error['class']; ?>" id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email</label>
                <?= $error['message']; ?> <!--Call to function to display error messages-->
            </div>
            <div class="form-floating">
                <?php $error = checkEmptyFields('pwd'); ?>
                <input type="password" name="pwd" class="inputField <?= $error['class']; ?>" id="floatingPassword" placeholder="Mot de passe">
                <label for="floatingPassword">Mot de passe</label>
                <?= $error['message']; ?>
            </div>
            <button class="connect" type="submit">Connexion</button>
            <p class="mt-4 mb-3 text-body-secondary text-center"> <!--Generate link-->
                <a href="<?= $router->generate('lostPassword'); ?>">Mot de passe oublié ?</a>
            </p>
        </form>
    </div>
    
</div>

<?php get_footer('login'); ?>