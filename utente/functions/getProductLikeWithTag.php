<?php

    function getProductLikeWithTag($name, $tag_id)
    {
        $url = "http://localhost:8080/Progetto-Panini/food-api/API/product/getArchiveProductsLikeWithTag.php?nome_panino=$name&tag_id=$tag_id";
        return json_decode(file_get_contents($url));
    }
?>