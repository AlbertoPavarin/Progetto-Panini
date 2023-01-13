<?php 

function getArchivePickup()
{
    $url = 'http://localhost:8080/Progetto-Panini/food-api/API/order/pickup/getPickup.php';
    //$url = 'http://localhost/progetti_PHP/Progetti-Panini/food-api/API/order/pickup/getPickupById.php?ID=' . $id';
    return json_decode(file_get_contents($url));
}

?>