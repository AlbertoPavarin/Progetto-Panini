<?php
function getPickup($id)
{
    $url = "http://localhost:8080/Progetto-Panini/food-api/API/order/pickup/getPickupById.php?ID=" . $id;
    return json_decode(file_get_contents($url));
}
?>