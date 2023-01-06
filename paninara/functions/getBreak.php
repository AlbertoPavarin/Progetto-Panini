<?php 

function getBreak($id)
{
    $url = 'http://localhost:8080/Progetto-Panini/food-api/API/order/break/getBreak.php?BREAK_ID=' . $id;
    //$url = 'http://localhost/progetti_PHP/Progetti-Panini/food-api/API/order/break/getBreak.php?BREAK_ID=' . $id';
    return json_decode(file_get_contents($url));
}

?>