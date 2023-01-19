<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveProductByTag.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/getCategory.php';

$user = checkLogin();

if (isset($_GET["product_id"]))
{

    $product_id = $_GET["product_id"];

    $product = getProduct($product_id);

}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Index</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <header class="">
        <nav class="nav container-ns">
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list ul">
                        <li class="nav__item pt-2">
                            <a href="#home" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="#skills" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profilo</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="#contactme" class="nav__link">
                                <i class='bx bx-cart nav__icon'></i>
                                <span class="nav__name">Carrello</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="product-page-container"></div>
            </div>
        </main>
    </body>

</html>