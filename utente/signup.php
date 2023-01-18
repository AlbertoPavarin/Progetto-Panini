<?php

session_start();

include_once dirname(__FILE__) . '/functions/login.php';
include_once dirname(__FILE__) . '/functions/checkLogin.php';

if (count($_SESSION) > 0)
{
    header('Location: index.php');
    exit();
};

$err = "";
$loginErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $data = [
      "email" => $_POST['email'],
      "password" => $_POST['password'],
    ];

    if (login($data) == -1)
    {
      $loginErr = "Email o password errata";
    }
  }
  else
  {
    $loginErr = "Tutti i campi richiesti";
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Login</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="signup-pill-container">
                    <div class="signup-red-pill"></div>
                </div>
            </div>
        </div>
    </body>

</html>