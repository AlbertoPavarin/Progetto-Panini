<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveProductByTag.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/getCategory.php';
include_once dirname(__FILE__) . '/functions/getCart.php';
include_once dirname(__FILE__) . '/functions/getPickups.php';


$user = checkLogin();

$cart = getCart($_SESSION['user_id']);

$pickups = getPickups();

?>

<!DOCTYPE html>
<html>
    <head>
    <script src="js/updateCartQuantity.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="js/breakByPickup.js"></script>
        <title>Categoria</title>
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
                            <a href="profile.php" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profilo</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="" class="nav__link active-link">
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
            <div class="container pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="name-home">
                            <p>Ciao, <b><?php echo $user[0]->name ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <select id="pickup-select" aria-label="Default select example" onchange=getBreakByPickup(this)>
                        <option selected>Seleziona punto di ritiro</option>
                        <?php
                        foreach($pickups as $pickup)
                        {?>
                            <option value="<?php echo $pickup->id ?>"><?php echo $pickup->name ?></option>
                        <?php }
                        ?>
                </select> 
            </div> 
            <div class="d-flex justify-content-center align-items-center mt-4">
                <select id="break-select" aria-label="Default select example">
                        <option selected>Seleziona ricreazione</option>
                </select> 
            </div> 
        </main>
    </body>

</html>