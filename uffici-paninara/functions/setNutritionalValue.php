<?php

function setNutritionalValue($kcal,$fats,$saturated_fats,$carbohydrates,$sugars,$proteins,$fiber,$salt)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/nutritional_value/setNutritionalValue.php?kcal='.$kcal.'&fats='.$fats.'&saturated_fats='.$saturated_fats.'&carbohydrates='.$carbohydrates.'&sugars='.$sugars.'&proteins='.$proteins.'&fiber='.$fiber.'&salt='.$salt;
    return json_decode(file_get_contents($url));
}
?>