<?php
session_start();

include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveUserOrders.php';

$user = checkLogin();

$orders = getArchiveUserOrders($_SESSION["user_id"]);

var_dump($orders);

?>

<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordini</title>
</head>
<body>
    
</body>
</html>