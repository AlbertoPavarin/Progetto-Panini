<?php 

function getClassById($id)
{
    $url = 'http://localhost:8080/Progetto-Panini/food-api/API/class/getClassById.php?ID=' . $id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/class/getClassById.php?ID=' . $id;
    return json_decode(file_get_contents($url));
}

?>