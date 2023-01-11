<?php

function getArchiveProduct()
{
   // $url = 'http://localhost:8080/Progetto-Panini/food-api/API/product/getArchiveProducts.php';
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/getArchiveProducts.php';
    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc=true);
    $product_data = $decode_data;
    $product=array();
    foreach ($product_data as $prod) {
      $product_record= array(
        'id' => $prod["ID"],
        'name' => $prod["Nome prodotto"],
        'price' => $prod["Prezzo"],
        'tag' => $prod["Tag"],
        'quantity' => $prod['quantity'],
        'active' =>$prod["active"],
    );
  array_push($product,$product_record);
  }
  return $product;
}
?>