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
                <h2>Hi, <?php echo $user[0]->name ?></h2>
            </div>
        </row>
        <div>
             <?php
                foreach($categories as $category)
                {
                    ?>
                <div class="table-container col-10 offset-1 mt-5">
                    <div class="row category-container">
                        <div>
                        <h3><?php echo ucfirst($category->name) . '<br>';?></h3>
                        </div>
                    </div>
            <table class="table table-striped mb-5">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Quantità</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $products_id = getArchiveProductByTag($category->id);;
                    foreach($products_id as $prod_id){
                        $product = getProduct($prod_id->product);?>
                        <tr>
                            <th scope="row"><?php echo $product['id'];?></th>
                            <td><?php echo $product['name'];?></td>
                            <td><?php echo $product['price'];?>€</td>
                            <td><?php echo $product['description'];?></td>
                            <td><?php echo $product['quantity'];?></td>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
            </div>
            <?php
                }
            ?>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
