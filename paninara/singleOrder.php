<?php

include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';

session_start();

$user = checkLogin();

$c = array_count_values(array_column(getOrderProduct($_GET['ORDER_ID']), 'product'));

$products = array();

foreach(array_keys($c) as $record)
{
    $product = getProduct($record);
    array_push($products, $product);
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ordine</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <div>
        <?php // magari qui fare una golosa tabella, non la ho fatta è abbastanza tardi in questo momento e inizio ad avere sonno
                foreach($products as $product)
                {
                    echo "Id Prodotto: ".$product["id"] . "<br>";
                    echo "Nome prodotto: " . $product["name"] . "<br>";
                    echo "Descrizione prodotto: " . $product["description"] . "<br>";
                    echo "Prodotto in magazzino: " . $product["quantity"] . "<br>";
                    echo "Prodotto nell'ordine:" . $c[$product['id']] . "<br><br>";
                }
            ?>
        </div>
    </body>
</html>