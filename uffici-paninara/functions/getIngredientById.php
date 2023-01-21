<?php 
function getIngredientById($id)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/getIngredientById.php?INGREDIENT_ID=' . $id;
    return json_decode(file_get_contents($url));
}

?>