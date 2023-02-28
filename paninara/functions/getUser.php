<?php 

function getUser($id)
{
    $url = 'https://localhost/Progetto-Panini/food-api/API/user/getUser.php?id=' . $id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/user/getUser.php?id=' . $id;
    return json_decode(file_get_contents($url));
}

?>