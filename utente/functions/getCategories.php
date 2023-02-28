<?php

function getCategories()
{
    $arrContextOptions=array(
        "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      ); 
    $url = 'https://localhost/Progetto-Panini/food-api/API/tag/getArchiveTag.php';
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/tag/getArchiveTag.php';
    return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
}
?>