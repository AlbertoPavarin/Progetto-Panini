<?php

include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/getOrder.php';
include_once dirname(__FILE__) . '/functions/getUser.php';
include_once dirname(__FILE__) . '/functions/setStatusOrder.php';

session_start();

$userLogged = checkLogin();

$order = getOrder($_GET['ORDER_ID']);

$price = 0;

if (isset($order))
{
    $c = array_count_values(array_column(getOrderProduct($order[0]->id), 'product'));

    $user = getUser($order[0]->user)[0];

    $products = array();

    foreach(array_keys($c) as $record)
    {
        $product = getProduct($record);
        array_push($products, $product);
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ordine</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="static/css/style.css">
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
                            ordini
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="activeOrder.php?ORDER_ID=0">lista attivi</a></li>
                            <li><a class="dropdown-item" href="activeOrderByClass.php?ORDER_ID=0">lista attivi per classe</a></li>
                            <li><a class="dropdown-item" href="activeOrdersByPickup.php?ORDER_ID=0">lista attivi per punto di ritiro</a></li>
                        </ul>
                        </li>
                    </ul>
                    <a class=" logout-a" href='functions/logout.php' aria-current="page">Logout</a>
                    <form class="d-flex" role="search" id="searchForm" action="singleOrder.php?ORDER_ID">
                        <input class="form-control me-2" name="ORDER_ID" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">cerca odini per id</button>
                    </form>
                </div>
            </div>
        </nav>
        <row>
            <div class="header">        
                <h1>SANDWECH</h1>
                <h2>Hi, <?php echo $userLogged[0]->name ?></h2>
            </div>
        </row>
        <div class="table-container col-10 offset-1 mt-5">
        <?php if (isset($order)) { ?>
            <h1>N° Ordine: <?php echo $order[0]->id ?></h1>
            <p><b>Proprietario:</b> <?php echo $user->email?></p>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome Prodotto</th>
                    <th>Descrizione</th>
                    <th>Quantità</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) {?>
                <tr>
                    <td><?php echo $product["id"] ?? ''; ?></td>
                    <td><?php echo $product["name"] ?? ''; ?></td>
                    <td><?php echo $product["description"] ?? ''; ?></td>
                    <td><?php echo $c[$product['id']] ?? ''; ?></td>
                </tr>
                <?php
                $price += $product["price"] * $c[$product['id']];
             }?>
            </tbody>
            </table>
            <p><b>Prezzo Ordine:</b> <?php echo $price?>€</p>
            <?php
                if ($order[0]->status == 1) {
            ?> 
            <div class="row">
                <div class="bord_top_solid p-3">
                    <form action="" method="post">
                    <!--<form action="http://localhost/progetti_PHP/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=0">-->
                        <input type="submit" class="btn btn-primary btn-block col-12" value="pronto"></input>   
                    </form>
                </div>
            </div>
            <?php
                }
                else
                {
                    echo "
                    <div class='row'>
                        <div class='bord_top_solid p-3'>
                            <h4>Ordine già conslcuso</h4>
                        </div>
                    </div>";
                }
            ?> 
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                setStatusOrder($order[0]->id);
                echo '<script>
                alert("Ordine Pronto");
                location.href = "activeOrder.php?ORDER_ID=0";
                </script>';
            }
        }
            else
            {
                echo "Nessun ordine con questo ID";
            }?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>