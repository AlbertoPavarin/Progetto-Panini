<?php
error_reporting(0);
function getOrder($id)
{
    $url = "http://localhost:8080/Progetto-Panini/food-api/API/order/getOrder.php?ID=" . $id;
    return json_decode(file_get_contents($url));
}
?>