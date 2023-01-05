<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getCategories.php';
include_once dirname(__FILE__) . '/functions/getArchiveProductByTag.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';

session_start();

$user = checkLogin();

$categories = getCategories();
//var_dump($categories);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>categories</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="static/css/style.css">

    </head>
    <body>
    <body>
        <row>
            <div class="header">        
                <h1>SANDWECH </h1>
                <h2>Hi, <?php echo $user[0]->name ?></h2>
            </div>
        </row>
        <div>
            <?php
                foreach($categories as $category)
                {
                    ?>
                    <div class="row" style="border-style: solid; border-color:black; border-width: 1px;;">
                        <div>
                    <?php
                    echo $category->name . '<br>';?>
                    <?php
                    $product_id = getArchiveProductByTag( $category->id);
                    foreach($product_id as $prod_id){
                        $product = getProduct($prod_id->product);?>
                        <div class="row">
                        <?php
                        echo $product['name'] . '<br>';?>
                        </div>
                        <?php
                    } ?>
                        </div>
                    </div>
                    <?php

                }
            ?>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
