<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/setStatusOrder.php';
include_once dirname(__FILE__) . '/functions/getPickup.php';
include_once dirname(__FILE__) . '/functions/getBreak.php';
include_once dirname(__FILE__) . '/functions/getStatus.php';


session_start();

$user = checkLogin();

$order_id=0;
$id = $_GET['ORDER_ID'];
//error_reporting(0);
//var_dump($order_arr_active);
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
                            ordini
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="activeOrder.php?ORDER_ID=0">lista attivi</a></li>
                            <li><a class="dropdown-item" href="#">lista attivi per classe</a></li>
                        </ul>
                        </li>
                    </ul>
                    <a class=" logout-a" href='functions/logout.php' aria-current="page">Logout</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">cerca odini per id</button>
                    </form>
                </div>
            </div>
        </nav>
        <row>
            <div class="header">        
                <h1>SANDWECH </h1>
                <h2>Hi, <?php echo $user[0]->name ?></h2>
                <a href="index.php">home</a>
            </div>
        </row>        
        <div class="table-container col-10 offset-1">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>user</th>
                    <th>created</th>
                    <th>pickup</th>
                    <th>break</th>
                    <th>status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php

                if(is_array($order_arr_active)!==false){      
                    foreach($order_arr_active as $total){
                    $order_id=$total['id'];
                ?>
                <tr>
                    <td><?php echo $total['id']??''; ?></td>
                    <td><?php echo $total['user']??''; ?></td>
                    <td><?php echo $total['created']??''; ?></td>
                    <td><?php echo getPickup($total['pickup'])[0]->name??''; ?></td>
                    <td><?php echo getBreak($total['break'])[0]->time??''; ?></td>
                    <td><?php echo getStatus($total['status'])[0]->description??''; ?></td>
                    <td>
                        <a href="http://localhost:8080/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?php echo $order_id; ?>">visualizza</a>
                        <!--<a href="http://localhost/progetti_PHP/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?/*php echo $order_id;*/?>">visualizza</a>-->
                    </td>
                </tr>
            <?php }}?>
            </tbody>
            </table>
                <?php if($_SERVER['REQUEST_METHOD'] == "GET"){
                    if($_GET['ORDER_ID']==0){
                        $order_id=0;
                    }else{?>           
                    <div class="row table_single_ord">
                        <div class="bord_solid col-6 offset-3">
        
                        <div class="row">
                            <div class="bord_bottom_solid">
                                ORDINE N° <?php echo $_GET['ORDER_ID']; ?>
                            </div>
                        </div>
                    <?php
                    $price=0;
                    
                    $ord_prod_arr=getOrderProduct($id);
                    if(is_array($ord_prod_arr)){
                        foreach($ord_prod_arr as $record){
                            ?>
                            <div class="row">
                                <div class="">
                                <?php
                            $id_product = $record['product']; 
                            $product= getProduct($id_product);
                            $price+=$product['price'];
                            echo ("-");
                            echo ($product['name']);?></div></div>
                            <?php
                        }}?>
                        <div class="row">
                            <div class="bord_top_solid">
                                Totale: <?php echo $price?>€
                            </div>
                        </div> 
                        <div class="row">
                            <div class="bord_top_solid p-3">
                                <form action="" method="post">
                                <!--<form action="http://localhost/progetti_PHP/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=0">-->
                                    <input type="submit" class="btn btn-primary btn-block col-12" value="pronto"></input>   
                                </form>
                            </div>
                        </div>   
                        <?php 
                        }}
                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            setStatusOrder($id);
                            header('Location: activeOrder.php?ORDER_ID=0');
                        }
                        ?>                
                </div>
            </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>