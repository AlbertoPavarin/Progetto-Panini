<?php

function getArchiveOffer()
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/offer/getArchiveOffer.php';
    return json_decode(file_get_contents($url));
}

?>