<?php 

function getArchiveTag()
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/tag/getArchiveTag.php';
    return json_decode(file_get_contents($url));
}

?>