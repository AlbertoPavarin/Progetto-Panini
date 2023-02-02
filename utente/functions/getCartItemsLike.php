<?php
    function getCartItemsLike($user, $prod)
    {
        $prod = str_replace(" ", "+", $prod);
        $url = "http://localhost:8080/Progetto-Panini/food-api/API/cart/getCartItemsLike.php?user=$user&product=$prod";   
        return json_decode(file_get_contents($url));
    }
?>