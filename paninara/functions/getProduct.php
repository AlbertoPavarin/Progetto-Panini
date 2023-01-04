<?php

function getProduct($id)
{
    $url = 'http://localhost/progetti_PHP/food-api/API/product/getProduct.php?PRODUCT_ID='.$id;
    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data);
    $product_data = $decode_data;
    $product= array();
    foreach ($product_data as $prod) {
      $order_record= array(
        'id' => $prod ->id,
        'name' => $prod ->name,
        'price' => $prod ->price,
        'descriprion' =>$prod ->descriprion,
        'quantity' => $prod ->quantity,
        'nutritional_values' => $prod ->nutritional_values,
        'active' => $prod ->active    
    );   
    array_push($product, $order_record);
    }
    echo json_encode($product);
    return $product;
}
?>
