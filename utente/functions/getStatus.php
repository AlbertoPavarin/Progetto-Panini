<?php
function getStatus($id)
{
    $url = "http://localhost:8080/Progetto-Panini/food-api/API/order/status/getStatus.php?STATUS_ID=" . $id;
    return json_decode(file_get_contents($url));
}
?>