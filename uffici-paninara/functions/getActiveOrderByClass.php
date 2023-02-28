<?php

function getActiveOrderByClass($id)
{
  //$url = 'https://localhost/Progetto-Panini/food-api/API/order/getActiveOrderByClass.php?ID=' . $id;
  $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/order/getActiveOrderByClass.php?ID=' . $id;

  if (@file_get_contents($url) === false) {
    return -1;
  } else {
    $json_data = file_get_contents($url);
    $decode_data = json_decode($json_data);
    $active_order_data = $decode_data;
    $order_arr_active = array();
    foreach ($active_order_data as $order) {
      $order_record = array(
        'id' => $order->id,
        'created' => $order->created,
        'pickup' => $order->pickup,
        'break' => $order->break,
        'status' => $order->status,
        'json' => $order->json
      );
      array_push($order_arr_active, $order_record);
    }
    return $order_arr_active;
  }
}
?>