<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getActiveOrder.php';
include_once dirname(__FILE__) . '/functions/getOrderProduct.php';
include_once dirname(__FILE__) . '/functions/getProduct.php';


session_start();

$user = checkLogin();

$order_id=0;

//var_dump($order_arr_active);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ordini attivi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="static/css/style.css">

    </head>
    <body>
    <body>
        <row>
            <div class="header">        
                <h1>SANDWECH </h1>
                <h2>Hi, <?php echo $user[0]->name ?></h2>
                <a href="index.php">home</a>
            </div>
        </row>        
        <div class="table-container col-10 offset-1">
            <table  class="table table-bordered">
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
                if(is_array($order_arr_active)){      
                foreach($order_arr_active as $total){
                    $order_id=$total['id'];
                ?>
                    <tr>
                    <td><?php echo $total['id']??''; ?></td>
                    <td><?php echo $total['user']??''; ?></td>
                    <td><?php echo $total['created']??''; ?></td>
                    <td><?php echo $total['pickup']??''; ?></td>
                    <td><?php echo $total['break']??''; ?></td>
                    <td><?php echo $total['status']??''; ?></td>
                    <td>
                        <!--<a href="http://localhost:8080/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?/*php echo $order_id;*/ ?>">visualizza</a>-->
                        <a href="http://localhost/progetti_PHP/Progetto-Panini/paninara/activeOrder.php?ORDER_ID=<?php echo $order_id;?>">visualizza</a>
                    </td>
                    </tr>
                <?php }}?>
                </tbody>
            </table>
            <row>
                <div>
                <?php if($_SERVER['REQUEST_METHOD'] == "GET"){
                    if($_GET['ORDER_ID']==0){
                        $order_id=0;
                    }else{
                    $id = $_GET['ORDER_ID'];
                    $ord_prod_arr=getOrderProduct($id);
                    if(is_array($ord_prod_arr)){
                        foreach($ord_prod_arr as $record){
                            ?>
                            <div><?php
                            $id_product = $record['product']; 
                            $product= getProduct($id_product);
                            echo $product['name'];?></div>
                            <?php
                        }}}}?>                   
                </div>
            </row>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>