<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';

session_start();

$user = checkLogin();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>

        <h1>Hi, <?php echo $user[0]->name ?></h1>
        <a href="categories.php">Vai a categorie</a>
    </body>
</html>