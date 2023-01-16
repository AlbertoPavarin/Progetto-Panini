<?php 

function getAll_Ingredient()
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/product/getAll_Ingredient.php';
    $json_data = file_get_contents($url);
    $decode_data = json_decode($json_data, $assoc=true);
    $ingredient_data = $decode_data;
    $ingredient=array();
    foreach ($ingredient_data as $ingr) {
      $ingredient_record= array(
        'id' => $ingr["id"],
        'name' => $ingr["name"],
        'description' =>$ingr["description"],
        'price' => $ingr["price"],
        'extra' => $ingr["extra"],
        'quantity' => $ingr['quantity'],
    );
  array_push($ingredient,$ingredient_record);
    }
  return $ingredient;
}
?>