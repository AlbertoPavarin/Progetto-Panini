<?php

function getProduct($id)
{
  $url = 'http://localhost:8080/Progetto-Panini/food-api/API/product/getProduct.php?PRODUCT_ID='.$id;
    //$url = 'http://localhost/progetti_PHP/food-api/API/product/getProduct.php?PRODUCT_ID='.$id;
    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc=true);
    $product_data = $decode_data;
    var_dump($decode_data);
    $products= array();
    foreach ($product_data as $prod) {
      $order_record= array(
        'id' => $prod["id"],
        'name' => $prod["name"],
        'price' => $prod["price"],
        'description' =>$prod["description"],
        'quantity' => $prod["quantity"],
        'nutritional_values' => $prod["nutritional_value"],
    );   
    array_push($products, $order_record);
    }
    return $products;
}
?>
