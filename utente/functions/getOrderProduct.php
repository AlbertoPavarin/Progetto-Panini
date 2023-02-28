<?php
function getOrderProducts($id)
{
    $arrContextOptions=array(
        "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      ); 
    $url = "https://localhost/Progetto-Panini/food-api/API/order/getOrderProduct.php?ORDER_ID=" . $id;
    return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
}
?>