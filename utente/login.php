<?php

session_start();

//include_once dirname(__FILE__) . '/functions/login.php';

$err = "";
$loginErr = "";

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $err = "Campo richiesto";
  }
}*/
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Login</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <div class="login-container">
            <div class="pills-container1">
                <div class="orange-pill"></div>
                <div class="red-pill"></div>
            </div>
            <div class="d-flex justify-content-center">
                <div id="logo-box">
                    <img src="static/img/app_logo.png" alt="" srcset="" class="logo-img">
                </div>
            </div>
            <div class="pills-container2">
                <div class="orange-pill2"></div>
                <div class="red-pill2"></div>
            </div>
            <div class="login-w d-flex justify-content-center align-items-center">
                Login
            </div>
            <div class="line-box d-flex justify-content-center align-items-center">
                <div class="line"></div>
            </div>
            <div class="quote-box d-flex justify-content-center align-items-center">
                <div class="quote">Uno non può pensare bene, amare bene, dormire bene se non ha mangiato bene.</div>
            </div>
            <form action="" class="d-flex justify-content-center align-items-center">
                <input type="email" placeholder="Email" class="email-input">
                <input type="password" placeholder="Password" class="password-input">
            </form>
        </div>
    </body>

</html>