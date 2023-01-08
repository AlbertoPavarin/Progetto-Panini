<?php 

function getClass()
{
   // $url = 'http://localhost:8080/Progetto-Panini/food-api/API/class/getClass.php?';
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/class/getClass.php';
    return json_decode(file_get_contents($url));
}

?>