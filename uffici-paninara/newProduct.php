<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';

session_start();

$user = checkLogin();

//error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="static/css/style.css">
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
            <div class="form-container">
                <h2>crea un nuovo prodotto</h2>
                <form action="">
                    <div><input type="text" name="prod_name" value="iserisci nome"></div>
                    <div><input type="text" name="prod_price" value="inserisci prezzo"></div>
                    <div><input type="text" name="prod_quantity" value="inserisci quantità"></div>
                    <div><input type="text" name="prod_description" value="inserisci descrizione"></div>
                    <div><label for="text">valori nutrizionali</label></div>
                    <div><input type="text" name="nv_kcal" value="iserisci kcal"></div>
                    <div><input type="text" name="nv_fats" value="inserisci fats"></div>
                    <div><input type="text" name="nv_saturated_fats" value="inserisci saturated_fats"></div>
                    <div><input type="text" name="nv_carbohydrates" value="inserisci carbohydrates"></div>
                    <div><input type="text" name="nv_sugars" value="iserisci sugars"></div>
                    <div><input type="text" name="nv_proteins" value="inserisci proteins"></div>
                    <div><input type="text" name="nv_fiber" value="inserisci fiber"></div>
                    <div><input type="text" name="nv_salt" value="inserisci salt"></div>
                    <div><label for="text">ingredieti</label></div>
                    <div><input type="checkbox" name="" id=""></div>
                </form>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
<!--  setProductIngredient() -->