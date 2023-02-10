<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/getOrder.php';
include_once dirname(__FILE__) . '/functions/getPickup.php';
include_once dirname(__FILE__) . '/functions/getBreak.php';
include_once dirname(__FILE__) . '/functions/getStatus.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';

$user = checkLogin();

$order_id = $_GET['order'];

$order = getOrder($order_id);

$order_products = getOrderProducts($order_id);

function getTotalPrice($orders)
{
    $price = 0;
    foreach ($orders as $product)
    {
        $price += getProduct($product->product)['price'] * $product->quantity;
    }

    return $price;
}

function getjsonProducts($products)
{
    $json = array();
    foreach($products as $product)
    {
        $formattedProd = array(
            'ID' => '' . $product->product . '',
            'quantity' => '' . $product->quantity . ''
        );
        $json[] = $formattedProd;
    }
    return $json;
}

?>

<!DOCTYPE html>
<html>
    <head>
    <script src="js/reOrder.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Ordine</title>
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
                            <a href="profile.php" class="nav__link active-link">
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
            <div class="container pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="name-home">
                            <p>Ciao, <b><?php echo $user[0]->name ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <p><b>Ricreazione:</b> <?php echo getBreak($order[0]->break)[0]->time ?></p>
                    </div>
                    <div class="col-12">
                        <p><b>Punto di ritiro:</b> <?php echo getPickup($order[0]->break)[0]->name ?></p>
                    </div>
                    <div class="col-12">
                        <p><b>Stato ordine:</b> <?php echo ucfirst(getStatus($order[0]->status)[0]->description) ?></p>
                    </div>
                </div>
                <?php
                if (count((array)$order_products) > 0)
                {?>
                <div class="prods-container mt-5 pb-4">
                <?php
                    foreach ($order_products as $record)
                    {
                    $product = getProduct($record->product);
                        ?>
                    <div class="cart-prod-container mt-4 p-1">
                        <div class="row cart-prod mb-3" onclick=redirect(<?php echo $product['id'] ?>)>
                            <div class="col-2 d-flex justify-content-center align-items-center"><img src="static/icons/<?php echo $product['tag'] ?>-icon.png" class="icon-container"></div>
                            <div class="col-8 d-flex align-items-center"><b><?php echo $product['name']?></b></div>
                            <div class="col-2 d-flex justify-content-center align-items-center">
                                <div class="price-container">
                                <span class="p-price price-<?php echo $product['id'] ?>"><?php echo number_format($product['price'] * $record->quantity, 2, '.')?></span><span>€</span>
                                </div>
                            </div>
                        </div>
                            <div class="col-12 d-flex justify-content-center align-items-center pb-3">
                                <div class="quantity-container d-flex justify-content-center align-items-center">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div id="text-<?php echo $product['id'] ?>" class="col-4 d-flex justify-content-center align-items-center"><?php echo $record->quantity ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="d-flex justify-content-center align-items-end mt-5">
                        <div class="order-btn-container d-flex justify-content-center align-items-center p-4">
                            <input type="submit" value="Ordina" class="btnn" onclick='setOrder(<?php echo $_SESSION["user_id"] . "," .getTotalPrice($order_products) . "," . json_encode(getjsonProducts($order_products)) . "," . json_encode($order[0]->json) . "," . $order[0]->break . "," . $order[0]->pickup?>)'>
                        </div>
                    </div>
                    </div>

                    <?php
                }
                else
                {
                    echo "<h4 class='mt-5'>Nessun prodotto</h4>";
                }
                        ?>
        </main>
    </body>

</html>