<?php
session_start();

include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getCategories.php';

$user = checkLogin();

?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Profilo</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <?php require_once(__DIR__.'/static/circleButton.php'); ?>
        <header class="">
            <nav class="nav container-ns">
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list ul">
                        <li class="nav__item pt-2">
                            <a href="index.php" class="nav__link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="" class="nav__link active-link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profilo</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="cart.php" class="nav__link">
                                <i class='bx bx-cart nav__icon'></i>
                                <span class="nav__name">Carrello</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="home-container-pill">
                <div class="home-orange-pill"></div>
                <div class="home-red-pill"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="name-home">
                            <p>Ciao, <b><?php echo $user[0]->name ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center mt-5">
                    <div class="profile-container d-flex justify-content-center align-items-center">
                        <p class=""><?php echo strtoupper($user[0]->name[0] . $user[0]->surname[0]) ?></p>
                    </div>
                </div>
                <div class="row mt-5">
                    <p class="d-flex justify-content-center align-items-center user-name-prof"><b><?php echo ucfirst($user[0]->name) ?></b></p>
                </div>
                <div class="row">
                    <p class="d-flex justify-content-center align-items-center user-surname-prof"><b><?php echo ucfirst($user[0]->surname) ?></b></p>
                </div>
                <div class="row mt-3 d-flex justify-content-center align-items-center">
                    <div class="col-4 d-flex justify-content-center align-items-center btn-profile">
                        <form action="">
                            <input type="submit" value="Reset" class="btn" name="reset">
                        </form>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4 d-flex justify-content-center align-items-center btn-profile">
                        <form action="functions/logout.php">
                            <input type="submit" class="btn" value="Esci" name="esci">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>