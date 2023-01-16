<?php
//error_reporting(0);
include_once dirname(__FILE__) . '/functions/setNutritionalValue.php';
include_once dirname(__FILE__) . '/functions/setProduct.php';
include_once dirname(__FILE__) . '/functions/getArchiveNutritionalValue.php';

function replace($str){//cerc e sostituisce gli spazi tra le parole
return str_replace(' ','+',$str);
}

function isNumber($num){//controlla se il valore in input è un int o un double
    if(is_float($num)==false&&is_int($num)==false){
        return false;
    }else{
        return true;  
    }
}

function checkField(){
    $product_OK=false;
    $nv_OK=false;
    $ingredient_OK=false;
    $category_OK=false;
    $allergen_OK=false;

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['prod_name']!=NULL && $_POST['prod_price']!=NULL && $_POST['prod_quantity']!=NULL && $_POST['prod_description']!=NULL)
{    
    if(isNumber($_POST['prod_price'])==true){
        return  "<script>alert('errore nell'inserimento del prezzo');</script>";

    }else if(isNumber($_POST['prod_quantity'])==true){
        return  "<script>alert('errore nell'inserimento della quantità');</script>";
        
    }else{
        $product_OK=true;
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['nv_kcal']!=NULL && $_POST['nv_fats']!=NULL && $_POST['nv_saturated_fats']!=NULL && $_POST['nv_carbohydrates']!=NULL
&& $_POST['nv_sugars']!=NULL&& $_POST['nv_proteins']!=NULL&& $_POST['nv_fiber']!=NULL&& $_POST['nv_salt']!=NULL)
{
    if(isNumber($_POST['nv_kcal'])==true&&isNumber($_POST['nv_fats'])==true&&isNumber($_POST['nv_saturated_fats'])==true&&isNumber($_POST['nv_carbohydrates'])==true
    &&isNumber($_POST['nv_sugars'])==true&&isNumber($_POST['nv_proteins'])==true&&isNumber($_POST['nv_fiber'])==true&&isNumber($_POST['nv_salt'])==true){
      $nv_OK=true; 
    }
    else{
        return  "<script>alert('errore nell'inserimento delle quantità dei nutrienti');</script>";
    }
}


$ingredients_ID= $_POST['ingredient'];
if($_SERVER['REQUEST_METHOD'] =='POST' && !empty($ingredients_ID)){
$ingredient_OK=true;
}
$categories_ID= $_POST['category'];
if($_SERVER['REQUEST_METHOD'] =='POST' && !empty($categories_ID)){
$category_OK=true;
}
$allergen_ID= $_POST['allergen'];
if($_SERVER['REQUEST_METHOD'] =='POST' && !empty($allergen_ID)){
$allergen_OK=true;
}

$product_OK=true;//solo per testing
$nv_OK=true;//solo per testing

if($product_OK==true && $nv_OK==true && $ingredient_OK==true && $category_OK==true && $allergen_OK==true){

    setNutritionalValue(1,1,1,1,1,1,1,1);//solo per testing
    /*setNutritionalValue($_POST['nv_kcal'], $_POST['nv_fats'], $_POST['nv_saturated_fats'], $_POST['nv_carbohydrates'],
    $_POST['nv_sugars'], $_POST['nv_proteins'], $_POST['nv_fiber'],$_POST['nv_salt']!=NULL);*/
    $nv=getArchiveNutritionalValue();
    foreach($nv as $tmp){
        $nv_id = $tmp->id;
    }

    $prod_name=replace($_POST['prod_name']);
    $prod_description=replace($_POST['prod_description']);
    setProduct($prod_name, $_POST['prod_price'], $prod_description, $_POST['prod_quantity'], $nv_id,1);
    //aggiungere set delle tabelle di mezzo ingredient, tag, allergen
    return 'tutto ok';

}else{
    return 'errror';
}

}
?>