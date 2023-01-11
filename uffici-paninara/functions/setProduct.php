<?php

function setProduct($name,$price,$quantity,$description,$nutrtional_values,$active)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/setProduct.php?name='.$name.'&price='.$price.'&quantity='.$quantity.'&description='.$description.'&nutritional_values='.$nutrtional_values.'&active='.$active;
    return json_decode(file_get_contents($url));
}
?>