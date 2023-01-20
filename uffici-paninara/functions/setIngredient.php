<?php

function setIngredient($name,$description,$price,$extra,$quantity)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/setIngredient.php?name='.$name.'&description='.$description.'&price='.$price.'&extra='.$extra.'&quantity='.$quantity;
    return json_decode(file_get_contents($url));
}
?>