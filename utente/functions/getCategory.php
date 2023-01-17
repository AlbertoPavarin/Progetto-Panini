<?php 

function getcategory($id)
{
    $url = 'http://localhost:8080/Progetto-Panini/food-api/API/tag/getTag.php?tag_ID=' . $id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/user/getUser.php?id=' . $id;
    return json_decode(file_get_contents($url));
}

?>