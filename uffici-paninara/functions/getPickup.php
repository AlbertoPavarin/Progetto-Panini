<?php 

function getPickup($id)
{
   // $url = 'https://localhost/Progetto-Panini/food-api/API/order/pickup/getPickupById.php?ID=' . $id;
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/order/pickup/getPickupById.php?ID=' . $id;
    return json_decode(file_get_contents($url));
}

?>