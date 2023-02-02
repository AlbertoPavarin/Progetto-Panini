<?php
error_reporting(0);
include_once dirname(__FILE__) . '/functions/setNutritionalValue.php';
include_once dirname(__FILE__) . '/functions/setProduct.php';
include_once dirname(__FILE__) . '/functions/getArchiveNutritionalValue.php';
include_once dirname(__FILE__) . '/functions/setProductIngredient.php';
include_once dirname(__FILE__) . '/functions/setProductTag.php';
include_once dirname(__FILE__) . '/functions/setProductAllergen.php';
include_once dirname(__FILE__) . '/functions/getArchiveProduct.php';

function replace($str){//cerca e sostituisce gli spazi tra le parole
return str_replace(' ','+',$str);
}

function toFloat($num){
    $num= floatval($num);
    return $num;
}

function checkField(){
    $product_OK=false;
    $nv_OK=false;
    $ingredient_OK=false;
    $category_OK=false;
    $allergen_OK=false;
    $return=0;
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['prod_name']!=NULL && $_POST['prod_price']!=NULL && $_POST['prod_quantity']!=NULL && $_POST['prod_description']!=NULL)
{    
    $name=$_POST['prod_name'];
    $descr=$_POST['prod_descriprion'];    
    if(ctype_space($name)!=true && ctype_space($descr)!=true){
        echo "<script>alert('errore');</script>";
    }else if(floatval($_POST['prod_price'])==0){
        echo "<script>alert('errore nell'inserimento del prezzo');</script>";

    }else if(floatval($_POST['prod_quantity'])==0){

        echo "<script>alert('errore nell'inserimento della quantità');</script>";
        
    }else{
        $product_OK=true;
    }
}


if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['nv_kcal']!=NULL && $_POST['nv_fats']!=NULL && $_POST['nv_saturated_fats']!=NULL && $_POST['nv_carbohydrates']!=NULL
&& $_POST['nv_sugars']!=NULL&& $_POST['nv_proteins']!=NULL&& $_POST['nv_fiber']!=NULL&& $_POST['nv_salt']!=NULL)
{
    if(intval($_POST['nv_kcal'])!=0 &&floatval($_POST['nv_fats'])!=0 &&floatval($_POST['nv_saturated_fats'])!=0 &&floatval($_POST['nv_carbohydrates'])!=0
    &&floatval($_POST['nv_sugars'])!=0 &&floatval($_POST['nv_proteins'])!=0 &&floatval($_POST['nv_fiber'])!=0 &&floatval($_POST['nv_salt'])!=0 ){
        $nv_OK=true; 
    }
    else{
        $return= "<script>alert('errore nell'inserimento delle quantità dei nutrienti');</script>";
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

/*$product_OK=true;
$nv_OK=true;
$ingredient_OK=true;
$category_OK=true;
$allergen_OK=true;*/
if($product_OK==true && $nv_OK==true && $ingredient_OK==true && $category_OK==true && $allergen_OK==true){

    setNutritionalValue(intval($_POST['nv_kcal']), floatval($_POST['nv_fats']), floatval($_POST['nv_saturated_fats']), floatval($_POST['nv_carbohydrates']),
    floatval($_POST['nv_sugars']), floatval($_POST['nv_proteins']), floatval($_POST['nv_fiber']),floatval($_POST['nv_salt']));
    
    $nv=getArchiveNutritionalValue();
    foreach($nv as $tmp){
        $nv_id = $tmp->id;
    }

    $prod_name=replace($_POST['prod_name']);
    $prod_description=replace($_POST['prod_description']);
    
    setProduct($prod_name, floatval($_POST['prod_price']), $prod_description, intval($_POST['prod_quantity']), $nv_id,1);
    $prod=getArchiveProduct();

    foreach($prod as $tmp){
        $prod_id = $tmp['id'];
    }

    foreach($ingredients_ID as $ingr){
        setProductIngredient($prod_id,$ingr);  
    }

    foreach($categories_ID as $tag){
        setProductTag($prod_id,$tag);  
    }

    foreach($allergen_ID as $allergen){
        setProductAllergen($prod_id,$allergen);  
    }

}else{
    
    return "<script>alert('errore nella creazione del prodotto');</script>";
}
}
?>