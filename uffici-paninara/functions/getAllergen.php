<?php 

function getAllergen()
{
   // $url = 'http://localhost:8080/Progetto-Panini/food-api/API/class/getClass.php?';
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/allergen/getArchiveAllergen.php';
    return json_decode(file_get_contents($url));
}

?>