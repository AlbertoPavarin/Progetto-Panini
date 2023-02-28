<?php 

function getStatus($id)
{
   // $url = 'https://localhost/Progetto-Panini/food-api/API/order/status/getStatus.php?STATUS_ID=' . $id;
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/order/status/getStatus.php?STATUS_ID=' . $id;
    return json_decode(file_get_contents($url));
}

?>