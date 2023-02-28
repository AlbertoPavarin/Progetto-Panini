<?php

function getProduct($id)
{
  $arrContextOptions=array(
        "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      ); 
    $url = 'https://localhost/Progetto-Panini/food-api/API/product/getProduct.php?PRODUCT_ID='.$id;
    //$url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/getProduct.php?PRODUCT_ID='.$id;
    file_get_contents($url, false, stream_context_create($arrContextOptions));
    $json_data =     file_get_contents($url, false, stream_context_create($arrContextOptions));

    $decode_data = json_decode($json_data, $assoc=true);
    $product_data = $decode_data;
    $product=array();
    foreach ($product_data as $prod) {
      $product_record= array(
        'id' => $prod["id"],
        'name' => $prod["name"],
        'price' => $prod["price"],
        'tag' => $prod["Tag"],
        'quantity' => $prod['quantity'],
        'description' =>$prod["description"],
    );
  array_push($product,$product_record);
  }
  return $product_record;
}
?>
