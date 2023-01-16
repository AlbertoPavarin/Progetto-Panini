<?php

function getArchiveNutritionalValue()
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/nutritional_value/getArchiveNutritionalValue.php';
    return json_decode(file_get_contents($url));
}

?>