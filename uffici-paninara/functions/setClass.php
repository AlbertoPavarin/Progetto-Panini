<?php

function setClass($year,$section)
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/class/setClass.php?year='.$year.'&section='.$section;
    return json_decode(file_get_contents($url));
}
?>