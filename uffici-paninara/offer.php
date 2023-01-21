<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/setOffer.php';
include_once dirname(__FILE__) . '/functions/getArchiveOffer.php';


session_start();

$user = checkLogin();

$offer_arr=getArchiveOffer();


function formatTime($hour,$min,$year,$month,$day){
    if(intval($hour)>=10&&intval($hour)<=24){  
    }else if(intval($hour)>=0&&intval($hour)<=9){
        $hour='0'.$hour;
    }else{
        return 'error1';
    }

    if(intval($min)>=10&&intval($min)<=59){        
    }else if(intval($min)>=0&&intval($min)<=9){
        $min='0'.$min;
    }else{
        return 'error2';
    }

    if(intval($day)>=10&&intval($day)<=31){        
    }else if(intval($day)>0&&intval($day)<=9){
        $day='0'.$day;
    }else{
        return 'error3';
    }

    if(intval($month)>=10&&intval($month)<=12){        
    }else if(intval($month)>0&&intval($month)<=9){
        $month='0'.$month;
    }else{
        return 'error4';
    }

    if(intval($year)<2022){
        return 'error5';
    }
    $dateTime= $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':000000';
    return $dateTime;
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
            <h1>OFFERTE</h1>
            <h2>Hi, <?php echo $user[0]->name ?></h2>
        </div>
    </row>
    <div class="row">    
    <div class="  col-6 offset-3">
    <table class="table table-striped table-bordered">
        <thead>
                <tr>
                    <th>id</th>
                    <th>prezzo(€)</th>
                    <th>inizio</th>
                    <th>fine</th>
                    <th>descrizione</th>
                </tr>
            </thead>

        <?php
        if (is_array($offer_arr) !== false && count($offer_arr) > 0) {
            foreach ($offer_arr as $total) {
                $offer = $total->id;;
            ?>

            <tbody>
                <tr>
                    <td><?php echo $total->id; ?></td>
                    <td><?php echo $total->price; ?></td>
                    <td><?php echo $total->start; ?></td>
                    <td><?php echo $total->expiry; ?></td>
                    <td><?php echo $total->descrption; ?></td>

                </tr>
            <?php }} ?>

    </table>
    </tbody>
    <div class="row">
            <div class="container_pk rounded bord_solid txt-center col-6 offset-3" >
                <form class="form_" action="" method="post">
                    <label class="lbl-bold" for="text"> inserisci i dati della nuova offerta</label>
                    <div class="row form-element">
                    <label class="" for="text"> prezzo</label>
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="off_price" onkeypress="return isNumber(event)" placeholder="prezzo">
                    </div>
                    <div class="row form-element">
                    <label class="" for="text"> data inizio</label>
                        <input class=" col-2 offset-2" type="text" id="" rows="1" name="start_day" onkeypress="return isNumber(event)" placeholder="gg">
                        <label class="col-1" for="text">-</label>
                        <input class=" col-2 " type="text" id="" rows="1" name="start_month" onkeypress="return isNumber(event)" placeholder="mm">
                        <label class="col-1" for="text">-</label>
                        <input class=" col-2 " type="text" id="" rows="1" name="start_year" onkeypress="return isNumber(event)" placeholder="aaaa">
                    </div>
                    <div class="row form-element">
                    <label class="" for="text"> orario inizio</label>
                        <input class=" col-3 offset-2" type="text" id="" rows="1" name="start_hour" onkeypress="return isNumber(event)" placeholder="ora">
                        <label class="col-2" for="text">:</label>
                        <input class=" col-3 " type="text" id="" rows="1" name="start_min" onkeypress="return isNumber(event)" placeholder="minuti">
                    </div>
                    <div class="row form-element">
                        <label class="" for="text"> data fine</label>
                            <input class=" col-2 offset-2" type="text" id="" rows="1" name="end_day" onkeypress="return isNumber(event)" placeholder="gg">
                            <label class="col-1" for="text">-</label>
                            <input class=" col-2 " type="text" id="" rows="1" name="end_month" onkeypress="return isNumber(event)" placeholder="mm">
                            <label class="col-1" for="text">-</label>
                            <input class=" col-2 " type="text" id="" rows="1" name="edn_year" onkeypress="return isNumber(event)" placeholder="aaaa">
                        </div>
                    <div class="row form-element">
                        <label class="" for="text"> orario fine</label>
                        <input class=" col-3 offset-2" type="text" id="" rows="1" name="end_hour" onkeypress="return isNumber(event)" placeholder="ora">
                        <label class="col-2" for="text">:</label>
                        <input class=" col-3 " type="text" id="" rows="1" name="end_min" onkeypress="return isNumber(event)" placeholder="minuti">
                    </div>
                        <div class="row form-element">
                        <label class="" for="text"> descrizione</label>
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="off_descr" placeholder="descrizione">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="submit" name="create_pk" value="crea">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST' /*&& $_POST['start_hour']!=NULL && $_POST['start_min']!=NULL && intval($_POST['b_hour'])>=0 && intval($_POST['b_hour'])<=12 && intval($_POST['b_min'])>=0 && intval($_POST['b_min'])<=12*/){
        $start=formatTime($_POST['start_hour'],$_POST['start_min'],$_POST['start_year'],$_POST['start_month'],$_POST['start_day']);
        $end=formatTime($_POST['end_hour'],$_POST['end_min'],$_POST['end_year'],$_POST['end_month'],$_POST['end_day']);
        setOffer(intval($_POST['off_price']),$start,$end,$_POST['off_descr']);
        echo"<script> window.location.href = 'offer.php'; </script>"; 
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