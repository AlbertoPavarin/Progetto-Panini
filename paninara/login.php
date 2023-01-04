<?php

session_start();

include_once dirname(__FILE__) . '/functions/login.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = [
            "email" => $_POST['email'],
            "password" => $_POST['password'],
        ];

        login($data);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <form class="col-4 offset-4" action="" method="post">
            <label for="email">email</label><br>
            <input type="email" name="email" id=""><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>