<?php 

function getArchiveBreak()
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/order/break/getArchiveBreak.php';
    return json_decode(file_get_contents($url));
}

?>