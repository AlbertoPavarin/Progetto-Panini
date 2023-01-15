<?php 

function getUser($id)
{
    $url = 'http://localhost:8080/Progetto-Panini/food-api/API/user/getUser.php?id=' . $id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/user/getUser.php?id=' . $id;
    return json_decode(file_get_contents($url));
}

?>