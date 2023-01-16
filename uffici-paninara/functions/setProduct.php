<?php

function setProduct($name,$price,$description,$quantity,$nutritional_values,$active)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/setProduct.php?name='.$name.'&price='.$price.'&description='.$description.'&quantity='.$quantity.'&nutritional_value='.$nutritional_values.'&active='.$active;
    return json_decode(file_get_contents($url));
}
?>