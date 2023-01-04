<?php

include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';

session_start();

$user = checkLogin();

$order = getOrderProduct($_GET['ORDER_ID']);

$products = array();

foreach($order as $record)
{
    $product = getProduct($record["product"]);
    array_push($products, $product);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <div>
            <?php 
                foreach($products as $product)
                {
                    echo $product[0]["name"] . "<br>";
                }
            ?>
        </div>
    </body>
</html>