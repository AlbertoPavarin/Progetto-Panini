<?php
function getPickup($id)
{
    $arrContextOptions=array(
        "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      ); 
    $url = "https://localhost/Progetto-Panini/food-api/API/order/pickup/getPickupById.php?ID=" . $id;
    return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
}
?>