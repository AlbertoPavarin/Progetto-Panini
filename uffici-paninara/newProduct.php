<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getAll_Ingredient.php';
include_once dirname(__FILE__) . '/functions/getCategories.php';
include_once dirname(__FILE__) . '/functions/getAllergen.php';
include_once dirname(__FILE__) . '/product.php';


session_start();

$user = checkLogin();

//error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="static/css/new.css">
        <title>Ordini attivi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link element active" aria-current="page" href="index.php"><img src="static/img/app_logo.png" class="img-holder" alt=""></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link element active" aria-current="page" href="categories.php">categorie</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link element active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            magazino
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="warehouse.php?PRODUCT_ID=0">prodotti disponibili</a></li>
                        </ul>
                        </li>
                    </ul>
                    <a class=" logout-a" href='functions/logout.php' aria-current="page">Logout</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">cerca prodotto per id</button>
                    </form>
                </div>
            </div>
        </nav>
        <row>
            <div class="header">        
                <h1>SANDWECH </h1>
                <h2>Hi, <?php echo $user[0]->name ?></h2>
            </div>
        </row>
            <div class="form-container bord_solid col-4 offset-4 ">
                <h2 class="title-newProd bord_bottom_solid">crea un nuovo prodotto</h2>
                <form class="form-newProd" action="" method="post">
                    <div class="label-bgcolor"><label for="text">informazioni prodotto</label></div>
                    <div><label class="required-field-lbl" for="text">iserisci nome</label></div>
                    <div><input type="text" name="prod_name" value=""></div>
                    <div><label class="required-field-lbl" for="text">iserisci prezzo (senza valuta)</label></div>
                    <div><input type="text" name="prod_price" value=""></div>
                    <div><label class="required-field-lbl" for="text">iserisci descrizione</label></div>
                    <div><input type="text" name="prod_description" value=""></div>
                    <div><label class="required-field-lbl" for="text">iserisci quantità</label></div>
                    <div><input type="text" name="prod_quantity" value=""></div>

                    <div class="label-bgcolor label-margin-top"><label for="text">valori nutrizionali (in grammi)</label></div>
                    <div><label class="required-field-lbl" for="text">iserisci kcal</label></div>
                    <div><input type="text" name="nv_kcal" value=""></div>
                    <div><label class="required-field-lbl" for="text">iserisci grassi</label></div>
                    <div><input type="text" name="nv_fats" value=""></div>
                    <div><label class="required-field-lbl" for="text">inserisci grassi saturi</label></div>
                    <div><input type="text" name="nv_saturated_fats" value=""></div>
                    <div><label class="required-field-lbl" for="text">inserisci carboidrati</label></div>
                    <div><input type="text" name="nv_carbohydrates" value=""></div>
                    <div><label class="required-field-lbl" for="text">iserisci zucchero</label></div>
                    <div><input type="text" name="nv_sugars" value=""></div>
                    <div><label class="required-field-lbl" for="text">inserisci proteine</label></div>
                    <div><input type="text" name="nv_proteins" value=""></div>
                    <div><label class="required-field-lbl" for="text">inserisci fibre</label></div>
                    <div><input type="text" name="nv_fiber" value=""></div>
                    <div><label class="required-field-lbl" for="text">inserisci sale</label></div>
                    <div><input type="text" name="nv_salt" value=""></div>

                    <div class="label-bgcolor label-margin-top"><label for="text">ingredieti</label></div>
                    <?php 
                    $ingredients=getAll_Ingredient();
                    if(is_array($ingredients) !== false){
                    foreach($ingredients as $ingredient){?>
                        <div class="checkbox-div"><input type="checkbox" name="ingredient[]" value="<?php echo $ingredient['id'];?>">
                        <label for="text"><?php echo $ingredient['name'];?></label></div>
                        <?php }}?>

                    <div class="label-bgcolor label-margin-top"><label for="text">categoria</label></div>
                    <?php 
                    $categories=getCategories();
                    if(is_array($categories) !== false){
                        foreach($categories as $category){?>
                            <div class="checkbox-div"><input type="checkbox" name="category[]" value="<?php echo  ucfirst($category->id);?>" >
                            <label for="text"><?php echo ucfirst($category->name);?></label></div>
                    <?php }}?>

                    <div class="label-bgcolor label-margin-top"><label for="text">allergeni</label></div>
                    <?php 
                    $allergens=getAllergen();
                    if(is_array($allergens) !== false){
                        foreach($allergens as $allergen){?>
                            <div class="checkbox-div"><input type="checkbox" name="allergen[]" value="<?php echo  ucfirst($allergen->id);?>">
                            <label for="text"><?php echo ucfirst($allergen->name);?></label></div>
                    <?php }}?>
                    <input type="submit" value="sub">
                </form>
                <?php $val=checkField();
                echo $val;
                ?>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
<!-- setAllergen(), getArchive/setBreak(), setStatus(), get/setPickup() -->