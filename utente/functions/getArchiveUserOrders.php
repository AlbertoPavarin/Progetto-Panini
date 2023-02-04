<?php
function getArchiveUserOrders($id)
{
    $url = "http://localhost:8080/Progetto-Panini/food-api/API/order/getArchiveOrderUser.php?USER_ID=" . $id;
    return json_decode(file_get_contents($url));
}
?>