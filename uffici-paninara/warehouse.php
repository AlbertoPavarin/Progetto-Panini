<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';


session_start();

$user = checkLogin();
$prod_id=0;
$id=$_GET['PRODUCT_ID'];
$prod_arr=getArchiveProduct();
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
    <div class="table-container col-10 offset-1">
    <table class="table table-striped table-bordered">
        <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>prezzo</th>
                    <th>tag</th>
                    <th></th>
                </tr>
            </thead>

        <?php
        if (is_array($prod_arr) !== false && count($prod_arr) > 0) {
            foreach ($prod_arr as $total) {
                $prod_id = $total['id'];
            ?>

            <tbody>
                <tr>
                    <td><?php echo $total['id'] ?? ''; ?></td>
                    <td><?php echo $total['name'] ?? ''; ?></td>
                    <td><?php echo $total['price'] ?? ''; ?></td>
                    <td><?php echo $total['tag'] ?? ''; ?></td>
                    <td>
                        <!--<a href="http://localhost:8080/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?/*php echo $order_id;*/ ?>">visualizza</a>-->
                        <a href="http://localhost/progetti_PHP/Progetto-Panini/uffici-paninara/warehouse.php?PRODUCT_ID=<?php echo $prod_id;?>">visualizza</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        <?php ;}?>
    </table>
        <table class="product-table">
        <?php if ($_SERVER['REQUEST_METHOD'] == "GET") {
                    if ($_GET['PRODUCT_ID'] == 0) {
                        $order_id = 0;
                    } else { ?>
                    <div class="row table_single_ord">
                        <div class="bord_solid col-6 offset-3">
                        <div class="row">
                            <div class="bord_bottom_solid">
                                PRODOTTO N° <?php echo $_GET['PRODUCT_ID']; ?>
                            </div>
                        </div>
                <?php
                    $prod=getProduct($id); $stat = $prod['active'] ?? '';?>
                    <div><?php echo $prod['name'] ?? '';?></div>
                    <div> prezzo-<?php echo $prod['price'] ?? '';?></div>
                    <div>categoria-<?php echo $prod['tag'] ?? '';?></div>
                    <div>quantità-<?php echo $prod['quantity'] ?? '';?></div>
                    <div><?php if($stat==1){
                        echo "attivo";
                    }else{ echo "non attivo";}?></div>
                    <?php }} ?>
            </div>
            </div>
        </table>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

<!-- button update quantity, button attiva/disattiva prodotto, creazione nuovo prodotto, MODEL->product->setQuantity($Quantity), API->setQuantity.php, pagina offerte,
MODEL->product->setActive($1 o 2), API->setActive.php-->