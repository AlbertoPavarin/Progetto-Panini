<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveProductByTag.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/getCategory.php';
include_once dirname(__FILE__) . '/functions/getCart.php';

$user = checkLogin();

$cart = getCart($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html>
    <head>
    <script src="js/updateCartQuantity.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Categoria</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
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
                <div class="row">
                    <div class="col-12">
                        <form action="" method="post" class="mt-5">
                            <div class="form-group">
                                <input type="text" class="searchbar form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if (count((array)$cart) > 0)
                {
                    ?>
                <div class="prods-container mt-5">
                <?php
                    foreach ($cart as $product)
                    {?>
                        <div class="row cart-prod-container mb-3 <?php echo $product->product ?>">
                            <div class="col-2 d-flex justify-content-center align-items-center"><img src="static/icons/<?php echo getCategory($product->tag_id)[0]->name ?>-icon.png" class="icon-container"></div>
                            <div class="col-8 d-flex align-items-center"><b><?php echo $product->name?></b></div>
                            <div class="col-2 d-flex justify-content-center align-items-center">
                                <div class="price-container">
                                    <p class="p-price"><?php echo $product->price?>€</p>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center pb-3">
                                <div class="quantity-container">
                                    <div class="row">
                                        <div id="minus-btn-<?php echo $product->product ?>" class="col-4 d-flex justify-content-center align-items-center" onclick=deleteItem(<?php echo $product->product . "," . $_SESSION['user_id']?>)>-</div>
                                        <div id="text-<?php echo $product->product ?>" class="col-4 d-flex justify-content-center align-items-center"><?php echo $product->quantity ?></div>
                                        <div id="plus-btn-<?php echo $product->product ?>" class="col-4 pr-2 d-flex justify-content-center align-items-center" onclick=addItem(<?php echo $product->product . "," . $_SESSION['user_id']?>)>+</div>
                                    </div>
                                </div>
                                <div class="delete-container d-flex justify-content-center align-items-center" onclick=deleteProduct(<?php echo $product->product . "," . $_SESSION['user_id']?>)><i class='bx bx-trash'></i></div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <?php
                }
                else
                {
                    echo "<h4 class='mt-5'>Nessun prodotto attualmente nel carrello</h4>";
                }
                        ?>
            </div>
        </main>
    </body>

</html>