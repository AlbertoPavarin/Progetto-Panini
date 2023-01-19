<?php

error_reporting(0);

function getCart($id)
{
    $url = 'http://localhost:8080/Progetto-Panini/food-api/API/cart/getCart.php?user='.$id;
    return json_decode(file_get_contents($url));
}

?>