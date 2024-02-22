<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../public/css/scss/style.css">
    <link rel="shortcut icon" href="../../../../public/images/mixxcinema-high-resolution-logo-darkmode.png" type="image/x-icon" id="favicon">
    <title><?= $title; ?> | Movies</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .wrapper {
            max-width: 1300px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-around;
        }

        header {
            height: 80px;
            background-color: #F7B32B;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-between;
        }

        header #logo {
            width: 35%;
            height: 80px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: -125px;
        }

        header img {
            width: 120px;
            height: auto;
            object-fit: cover;
            margin-left: 50px;
        }

        #header-elements {
            width: 40%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            align-items: flex-end;
            justify-content: flex-end;  
            margin-right: -50px; 
            margin-bottom: 10px; 
        }

        #header-elements button {
            border: none;
            background-color: transparent;
            width: 60px;
        }

        #header-elements img {
            height: 22px;
            object-fit: contain;
            margin-left: 1px;
            margin-right: 1px;
        }

        #header-elements .searchbar {
            width: 250px;
            height: 24px;
            background-color: white;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            margin-left: 50px;
            margin-right: -35px;
        }

        #header-elements .searchbar #search {
            width: 250px;
            height: 24px;
            background-color: transparent;
            border: none;
            border-radius: 30px;
            padding: 0 10px;
        }

        #header-elements .searchbar img {
            height: 20px;
            object-fit: contain;
            position: absolute;
            top: 50%;
            right: -50px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        header nav {
            margin-top: -10px;
            width: 100vw;
            height: 35px;
            background-color: #000623;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        header nav a {
            padding: 1px 25px;
        }

        svg {
            margin-left: 10px;
        }

        header nav a:hover, header nav a:after {
            background-color: #F7B32B;
            transition: .3s ease;
        }
    </style>
</head>
<body>
    <header>
        <div class="wrapper">
            <div id="logo">
                <a href=""><img src="../../../../public/images/mixxcinema-high-resolution-logo-transparent (1) (1).svg" alt="Mixxcinema logo"></a>
            </div>
            <div id="header-elements">
                <button><img src="../../../../public/images/funnel.svg" alt="funnel"></button>
                <form action="" class="searchbar">
                    <input type="text" id="search">
                    <img src="../../../../public/images/search_magnifying_glass.svg" alt="Magnifying glass icon">
                </form>
                <button><img src="../../../../public/images/Dark-Mode.svg" alt="dark-mode"></button>  
                <button><img src="../../../../public/images/user_icon.svg" alt="user"></button>
                <button><img src="../../../../public/images/settings_icon.svg" alt="settings"></button>
            </div>
        </div>
        <nav>
            <div class="wrapper">
                <a href="<?= $router->generate('users'); ?>">Users<svg xmlns="http://www.w3.org/2000/svg" width="18.467" height="9.626" xmlns:v="https://vecta.io/nano">
                    <path d="M17.962 0H1.5A1.5 1.5 0 0 0 .443 2.558l7.2 7.2c1.156 1.154 3.029 1.154 4.185 0L14.57 7.02l4.463-4.463A1.5 
                    1.5 0 0 0 17.962 0z" fill="#060623"/></svg>
                </a>
                <a href="<?= $router->generate('listMovies'); ?>">Films<svg xmlns="http://www.w3.org/2000/svg" width="18.467" height="9.626" xmlns:v="https://vecta.io/nano">
                    <path d="M17.962 0H1.5A1.5 1.5 0 0 0 .443 2.558l7.2 7.2c1.156 1.154 3.029 1.154 4.185 0L14.57 7.02l4.463-4.463A1.5 
                    1.5 0 0 0 17.962 0z" fill="#060623"/></svg>
                </a>
                <a href="<?= $router->generate('listCategories'); ?>">Categories<svg xmlns="http://www.w3.org/2000/svg" width="18.467" height="9.626" xmlns:v="https://vecta.io/nano">
                    <path d="M17.962 0H1.5A1.5 1.5 0 0 0 .443 2.558l7.2 7.2c1.156 1.154 3.029 1.154 4.185 0L14.57 7.02l4.463-4.463A1.5 1.5 
                    0 0 0 17.962 0z" fill="#060623"/></svg>
                </a>
            </div>
        </nav>
    </header>
    <main class="container mb-4">
        <?php displayAlert(); ?>