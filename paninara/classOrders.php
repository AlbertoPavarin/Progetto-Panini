<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/setStatusOrder.php';
include_once dirname(__FILE__) . '/functions/getPickup.php';
include_once dirname(__FILE__) . '/functions/getBreak.php';
include_once dirname(__FILE__) . '/functions/getStatus.php';
include_once dirname(__FILE__) . '/functions/getClass.php';
include_once dirname(__FILE__) . '/functions/getActiveOrderByClass.php';
include_once dirname(__FILE__) . '/functions/getClassById.php';

function getProductsFromOrder($orderId, &$products, &$price)
{
    $product_order = getOrderProduct($orderId);
    
    foreach ($product_order as $record)
    {
        $product = getProduct($record['product']);
        $price += $product['price'];
        array_push($products, $product);
    }
}

session_start();

$user = checkLogin();
$check = false;

$id = $_GET['CLASS_ID'];
$order_arr_active = array();

$class = getClassById($id);
if ($class != NULL) 
{
    $order_arr_active = getActiveOrderByClass($class[0]->id);

    if ($order_arr_active > 0)
    {
        $check = true;
        $products = array();

        $price = 0;

        foreach ($order_arr_active as $order)
        {
            getProductsFromOrder($order['id'], $products, $price);
        }
    }

}
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
    <?php require_once(__DIR__.'/static/navbar/navbar.php'); ?>
        <row>
            <div class="header">        
                <h1>SANDWECH </h1>
                <h2>Hi, <?php echo $user[0]->name ?></h2>
            </div>
        </row>       
        <div class="table-container col-10 offset-1"> 
        <?php
        if (is_array($class) && $check)
        {
            echo "<h5 class='mt-5'>" . $class[0]->year .$class[0]->section . "</h5>";
        if (is_array($order_arr_active) !== false && count($order_arr_active) > 0) {
            foreach ($order_arr_active as $total) {
                $order_id = $total['id'];
            ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>creato</th>
                    <th>ritiro</th>
                    <th>ricreazione</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total['id'] ?? ''; ?></td>
                    <td><?php echo $total['created'] ?? ''; ?></td>
                    <td><?php echo getPickup($total['pickup'])[0]->name ?? ''; ?></td>
                    <td><?php echo getBreak($total['break'])[0]->time ?? ''; ?></td>
                    <td>
                        <a href="https://localhost/Progetto-Panini/paninara/singleOrder.php?ORDER_ID=<?php echo $order_id; ?>">visualizza</a>
                        <!--<a href="http://localhost/progetti_PHP/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?/*php echo $order_id;*/?>">visualizza</a>-->
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            <div class="row table_single_ord">
                <div class="bord_solid col-10 offset-1">
                    <div class="row">
                        <div class="bord_bottom_solid">
                            <p>Proprietario: <?php echo $class[0]->year . $class[0]->section; ?></p>
                        </div>
                     </div>
                    <?php
                        foreach ($products as $product) {
                            echo ("-");
                            echo ($product['name']) . "<br>";
                    } ?>
                        <div class="row">
                            <div class="bord_top_solid">
                                Totale: <?php echo $price ?>€
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
                    </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    foreach ($order_arr_active as $order)
                    {
                        setStatusOrder($order['id']);
                        echo '<script>location.href = "activeOrderbyClass.php"</script>';
                    }
                }
        }
    }
    else
    {
        echo '<h5 class="d-flex justify-content-center mt-5">Nessun ordine</h5>';
    }
                        ?>                
                </div>
            </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>