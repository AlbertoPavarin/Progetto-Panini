<?php

function getCategories()
{
    $url = 'http://localhost:8080/food-api/API/tag/getArchiveTag.php';
    //$url = 'http://localhost/progetti_PHP/food-api/API/tag/getArchiveTag.php';
    return json_decode(file_get_contents($url));
}

?>