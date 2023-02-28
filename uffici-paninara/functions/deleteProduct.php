<?php

function deleteProduct($id)
{
    //$url = 'https://localhost/Progetto-Panini/food-api/API/product/deleteProduct.php?ID='.$id;
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/deleteProduct.php?product_id='.$id;
    return json_decode(file_get_contents($url));
}
?>