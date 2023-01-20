<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';
include_once dirname(__FILE__) . '/functions/setStatusOrder.php';
include_once dirname(__FILE__) . '/functions/getPickup.php';
include_once dirname(__FILE__) . '/functions/getBreak.php';
include_once dirname(__FILE__) . '/functions/getStatus.php';
include_once dirname(__FILE__) . '/functions/getUser.php';
include_once dirname(__FILE__) . '/functions/getOrder.php';


session_start();

$user = checkLogin();

//error_reporting(0);
$order_arr_active = getActiveOrder();
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
    <?php require_once(__DIR__.'/static/navbar/navbar.php'); ?>
        <row>
            <div class="header mb-5">        
                <h1>SANDWECH </h1>
                <h2>Hi, <?php echo $user[0]->name ?></h2>
            </div>
        </row>  
        <div class="table-container col-10 offset-1">
        <?php
        if (is_array($order_arr_active) !== false && count($order_arr_active) > 0) {
            foreach ($order_arr_active as $total) {
                $order_id = $total['id'];
            ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">utente</th>
                    <th scope="col">creato</th>
                    <th scope="col">ritiro</th>
                    <th scope="col">ricreazione</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total['id'] ?? ''; ?></td>
                    <td><?php echo $total['user'] ?? ''; ?></td>
                    <td><?php echo $total['created'] ?? ''; ?></td>
                    <td><?php echo getPickup($total['pickup'])[0]->name ?? ''; ?></td>
                    <td><?php echo getBreak($total['break'])[0]->time ?? ''; ?></td>
                    <td>
                        <a href="http://localhost:8080/Progetto-Panini/paninara/singleOrder.php?ORDER_ID=<?php echo $order_id; ?>">visualizza</a>
                        <!--<a href="http://localhost/progetti_PHP/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?/*php echo $order_id;*/?>">visualizza</a>-->
                    </td>
                </tr>
            <?php }?>
            </tbody>
            </table>
                <?php
            }
            else
            {
                echo '<h5 class="d-flex justify-content-center mt-5">Nessun ordine</h5>';
            }
                        ?>                
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>