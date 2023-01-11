<?php

function getNutritionalValue($nutritionalValue_id)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/nutritional_value/setNutritionalValue.php?NUTRITIONALVALUE_ID='.$nutritionalValue_id;
    return json_decode(file_get_contents($url));
}

?>