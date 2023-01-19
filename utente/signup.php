<?php

session_start();

include_once dirname(__FILE__) . '/functions/signup.php';
include_once dirname(__FILE__) . '/functions/checkLogin.php';

if (count($_SESSION) > 0)
{
    header('Location: index.php');
    exit();
};

$err = "";
$loginErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['conf_password'])) {
    if ($_POST['conf_password'] == $_POST['password']){
      $data = [
        "name" => $_POST['name'],
        "surname" => $_POST['surname'],
        "email" => $_POST['email'],
        "password" => hash("sha256", $_POST['password']),
      ];
      

      if (signup($data) == -1)
      {
        $loginErr = "Errore nella creazione";
      }
    }
    else{
      $loginErr = "Le password devono coincidere";
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
        <title>Signup</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <div class="signup-pill-container">
          <div class="signup-red-pill"></div>
            <div class="signup-orange-pill"></div>
          </div>
        <div class="container">
            <div class="pb-5">
              <div class="signup-w-container">
                Crea il tuo account 
              </div>
              <div class="line-box">
                <div class="signup-line"></div>
              </div>
              <span class="error-msg"><?php echo $loginErr ?></span>
              <form action="" method="post">
              <div class="signup-container">
                <div class="signup-orange">
                  Nome
                </div>
                <input type="text" name="name" class="signup-input">
              </div>
              </div>
              <div class="mt-5 pb-5">
                <div class="signup-container">
                  <div class="signup-red">
                    Cognome
                  </div>
                  <input type="text" name="surname" class="signup-input">
                </div>
              </div>
              <div class=" mt-5 pb-5">
                <div class="signup-container">
                  <div class="signup-orange">
                    Mail
                  </div>
                  <input type="email" name="email" class="signup-input">
                </div>
              </div>
              <div class=" mt-5 pb-5">
                <div class="signup-container">
                  <div class="signup-red">
                    Password
                  </div>
                  <input type="password" name="password" class="signup-input">
                </div>
              </div>
              <div class=" mt-5 pb-5">
                <div class="signup-container">
                  <div class="signup-orange">
                    Conferma Password
                  </div>
                  <input type="password" name="conf_password" class="signup-input">
                </div>
              </div>
              <div class="signup-container">
                <input type="submit" value="Registrati" class="signup-btn">
              </div>
            </form>
        </div>
    </body>

</html>