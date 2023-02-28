<?php
    function getCartItemsLike($user, $prod)
    {
        $arrContextOptions=array(
            "ssl"=>array(
                  "verify_peer"=>false,
                  "verify_peer_name"=>false,
              ),
          ); 
        $prod = str_replace(" ", "+", $prod);
        $url = "https://localhost/Progetto-Panini/food-api/API/cart/getCartItemsLike.php?user=$user&product=$prod";   
        return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
    }
?>