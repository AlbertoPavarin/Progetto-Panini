<?php 

function getOrderProduct($id)
{
  $url = 'http://localhost:8080/Progetto-Panini/food-api/API/order/getOrderProduct.php?ORDER_ID='. $id;
    //$url = 'http://localhost/progetti_PHP/food-api/API/order/getOrderProduct.php?ORDER_ID='. $id;
    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data);
    $order_product_data = $decode_data;
    $order_prod_arr= array();
    foreach ($order_product_data as $ord_prod) {
      $order_record= array(
        'order' => $ord_prod-> order,
        'product' => $ord_prod  -> product
    );   
    array_push($order_prod_arr, $order_record);
    }
    return $order_prod_arr;
}

?>