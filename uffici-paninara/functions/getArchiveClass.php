<?php 

function getArchiveClass()
{
    $url = 'http://localhost/progetti_PHP/Progetto-Panini/food-api/API/class/getClass.php';
    if (@file_get_contents($url) === false) {
        return -1;
      } else {
        $json_data = file_get_contents($url);
        $decode_data = json_decode($json_data);
        $class_data = $decode_data;
        $class_arr = array();
        foreach ($class_data as $class) {
          $class_record = array(
            'id' => $class->id,
            'year' => $class->year,
            'section' => $class->section,

          );
          array_push($class_arr, $class_record);
        }
        return $class_arr;
      }
}

?>