<?php 

function getBreakByPickup($id)
{
    $arrContextOptions=array(
        "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      ); 
    $url = 'https://localhost/Progetto-Panini/food-api/API/order/pickup/getPickupIdBreak.php?PICKUP_ID=' . $id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/user/getUser.php?id=' . $id;
    return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
}

?>