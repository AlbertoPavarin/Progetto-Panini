<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/setBreak.php';
include_once dirname(__FILE__) . '/functions/getArchiveBreak.php';


session_start();

$user = checkLogin();

$break_arr=getArchiveBreak();
function formatTime($time){
    if(str_contains($time,'10')==true||str_contains($time,'11')==true||str_contains($time,'12')==true){
        return $time;
    }else{
        return '0'.$time;
    }
}

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="static/css/new.css">
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
                        <a class="nav-link element active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            opzioni
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="warehouse.php?PRODUCT_ID=0">prodotti disponibili</a></li>     
                            <li><a class="dropdown-item" href="pickup.php">punti di ritiro</a></li>
                            <li><a class="dropdown-item" href="tag.php">categorie</a></li>
                            <li><a class="dropdown-item" href="ingredient.php?INGREDIENT_ID=0">ingredienti</a></li>
                            <li><a class="dropdown-item" href="break.php">ricreazioni</a></li>
                            <li><a class="dropdown-item" href="class.php">classi</a></li>
                            <li><a class="dropdown-item" href="offer.php">offerte</a></li>
                        </ul>
                        </li>
                    </ul>
                    <a class=" logout-a" href='functions/logout.php' aria-current="page">Logout</a>

                </div>
            </div>
        </nav>

    <row>
        <div class="header">        
            <h1>BREAK</h1>
            <h2>Hi, <?php echo $user[0]->name ?></h2>
        </div>
    </row>
    <div class="row">    
    <div class="  col-6 offset-3">
    <table class="table table-striped table-bordered">
        <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                </tr>
            </thead>

        <?php
        if (is_array($break_arr) !== false && count($break_arr) > 0) {
            foreach ($break_arr as $total) {
                $break = $total->id;;
            ?>

            <tbody>
                <tr>
                    <td><?php echo $total->id; ?></td>
                    <td><?php echo $total->time; ?></td>
                </tr>
            <?php }} ?>

    </table>
    </tbody>
    <div class="row">
            <div class="container_pk rounded bord_solid col-4 offset-4" >
                <form class="form_" action="" method="post">
                    <label class="lbl-bold" for="text"> inserisci l'orario della nuova ricreazione</label>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="b_hour" onkeypress="return isNumber(event)" placeholder="ora">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="b_min" onkeypress="return isNumber(event)" placeholder="minuti">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="submit" name="create_pk" value="crea">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['b_hour']!=NULL && $_POST['b_min']!=NULL && intval($_POST['b_hour'])>=0 && intval($_POST['b_hour'])<=12 && intval($_POST['b_min'])>=0 && intval($_POST['b_min'])<=59){
        $hour=formatTime($_POST['b_hour']);
        $min=formatTime($_POST['b_min']);
        $time=$hour.':'.$min.':00';
        setBreak($time);
        echo"<script> window.location.href = 'break.php'; </script>"; 
    }
    ?>    
    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

<!--  button attiva/disattiva prodotto, creazione nuovo prodotto, pagina offerte, setPrice, setDescription-->