<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveProductByTag.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/getCategory.php';
include_once dirname(__FILE__) . '/functions/getProductIngredient.php';

$user = checkLogin();

if (isset($_GET["product_id"]))
{

    $product_id = $_GET["product_id"];

    $product = getProduct($product_id);

}

function concatenateProduct($id)
{
    $ingredients = getProductIngredients($id);
    $names = array(); 

    foreach($ingredients as $ingredient)
    {
        $names[] = $ingredient->name; 
    }

    return join(", ", (array)$names);
}

?>

<!DOCTYPE html>
<html>
    <head>
    <script src="js/updateProductQuantity.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Prodotto</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body class="">
        <?php require_once(__DIR__.'/static/circleButton.php'); ?>
        <header>
        <nav class="nav container-ns">
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list ul">
                        <li class="nav__item pt-2">
                            <a href="index.php" class="nav__link active-link">
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
                            <a href="cart.php" class="nav__link">
                                <i class='bx bx-cart nav__icon'></i>
                                <span class="nav__name">Carrello</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main class="pb-5">
                <div class="d-flex justify-content-center align-items-end prod-c">
                <div class="">
                    <!--<img src="static/img/<?php //echo $product['tag'] ?>panini.jpeg" alt="" class="prod-img-container d-flex justify-content-center align-items-end">-->
                </div>
                    <div class="product-page-container">
                        <div class="">
                            <div class="prod">
                                <p class="prod-name"><?php echo $product['name'] ?> | <?php echo $product['price'] ?>€</p>
                                <div class="line-box d-flex justify-content-center align-items-center">
                                    <div class="product-line"></div>
                                </div> 
                                <div class="prod-info-container">
                                    <p class="prod-desc">Descrizione</p>
                                    <p class="description-product"><?php echo $product['description'] ?></p>
                                    <p class="prod-ing">Ingredienti</p>
                                    <p><?php echo concatenateProduct($product['id']) ?></p>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center pb-3">
                                    <div class="quantity-container d-flex justify-content-center align-items-center">
                                        <div class="row">
                                            <div id="minus-btn-<?php echo $product['id'] ?>" class="col-4 d-flex justify-content-center align-items-center" onclick=deleteItem(<?php echo $product['id']?>)>-</div>
                                            <div id="text-<?php echo $product['id'] ?>" class="col-4 d-flex justify-content-center align-items-center">1</div>
                                            <div id="plus-btn-<?php echo $product['id'] ?>" class="col-4 pr-2 d-flex justify-content-center align-items-center" onclick=addItem(<?php echo $product['id']?>)>+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-end">
                                    <div class="order-btn-container d-flex justify-content-center align-items-center p-2" onclick=addToCart(<?php echo $product['id'] . "," . $_SESSION['user_id']?>)>Aggiungi al carrello</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </body>

</html>