<?php

error_reporting(0);

function getOrder($id)
{
    $url = 'https://localhost/Progetto-Panini/food-api/API/order/getOrder.php?ID='.$id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/order/getOrder.php?ID='.$id;
    return json_decode(file_get_contents($url));
}
?>