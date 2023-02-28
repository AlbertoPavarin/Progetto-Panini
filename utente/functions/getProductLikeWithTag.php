<?php

    function getProductLikeWithTag($name, $tag_id)
    {
        $arrContextOptions=array(
            "ssl"=>array(
                  "verify_peer"=>false,
                  "verify_peer_name"=>false,
              ),
          ); 
        $name = str_replace(" ", "+", $name);
        $url = "https://localhost/Progetto-Panini/food-api/API/product/getArchiveProductsLikeWithTag.php?nome_panino=$name&tag_id=$tag_id";
        return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions), $assoc=true));
    }
?>