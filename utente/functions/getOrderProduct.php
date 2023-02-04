<?php
function getOrderProducts($id)
{
    $url = "http://localhost:8080/Progetto-Panini/food-api/API/order/getOrderProduct.php?ORDER_ID=" . $id;
    return json_decode(file_get_contents($url));
}
?>