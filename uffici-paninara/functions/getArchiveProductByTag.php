<?php

function getArchiveProductByTag($id)
{
    //$url = 'https://localhost/Progetto-Panini/food-api/API/tag/product-tag/getArchiveProductTag.php?tag_id='.$id;
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/tag/product-tag/getArchiveProductTag.php?tag_id='.$id;
    return json_decode(file_get_contents($url));
}
?>