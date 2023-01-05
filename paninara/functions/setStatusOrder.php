<?php

function setStatusOrder($id)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/order/setStatusOrder.php?ID='.$id;
    return json_decode(file_get_contents($url));
}
?>