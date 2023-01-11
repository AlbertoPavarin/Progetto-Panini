<?php

function setQuantity($id,$quantity)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/setQuantity.php?PRODUCT_ID='.$id.'&QUANTITY='.$quantity;
    return json_decode(file_get_contents($url));
}
?>