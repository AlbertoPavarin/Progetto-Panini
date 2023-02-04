<?php
session_start();

include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getArchiveUserOrders.php';
include_once dirname(__FILE__) . '/functions/getPickup.php';
include_once dirname(__FILE__) . '/functions/getBreak.php';

$user = checkLogin();

$orders = getArchiveUserOrders($_SESSION["user_id"]);

?>

<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Ordini</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
</head>
<body>
<?php require_once(__DIR__.'/static/circleButton.php'); ?>
        <header class="">
        <nav class="nav container-ns">
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list ul">
                        <li class="nav__item pt-2">
                            <a href="index.php" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="profile.php" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profilo</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="cart.php" class="nav__link">
                                <i class='bx bx-cart nav__icon'></i>
                                <span class="nav__name">Carrello</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="home-container-pill">
                <div class="home-orange-pill"></div>
                <div class="home-red-pill"></div>
            </div>
            <div class="container pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="name-home">
                            <p>Ciao, <b><?php echo $user[0]->name ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="prods-container mt-5">
                <?php
                foreach($orders as $order)
                {?>
                <a href="singleOrder.php">
                    <div class="row prod-container mb-3">
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <span><?php echo "<b>Ordine N°</b>" . $order->id ?></span>
                        </div>
                        <div class="col-5 d-flex justify-content-center align-items-center">
                            <span class="mb-0"><b>Ritiro:</b> <?php echo(getPickup($order->pickup))[0]->name ?></span> 
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <span class="mb-0"><b>Ricreazione:</b> <?php echo(getBreak($order->break))[0]->time ?></span>
                        </div>
                    </div>
                </a>
                <?php }
                ?>
                </div>
            </div>
        </main>
</body>
</html>