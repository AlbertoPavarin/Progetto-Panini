<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/setIngredient.php';
include_once dirname(__FILE__) . '/functions/getAll_Ingredient.php';
include_once dirname(__FILE__) . '/functions/getIngredientById.php';
include_once dirname(__FILE__) . '/functions/updateIngredient.php';


session_start();

$user = checkLogin();
$ingr_arr=getAll_Ingredient();
$id=$_GET['INGREDIENT_ID'];
$ingr_id=0;
//error_reporting(0);
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
                    <a class="nav-link element active" aria-current="page" href="categories.php">categorie</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link element active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        magazino
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="warehouse.php?PRODUCT_ID=0">prodotti disponibili</a></li>
                        <li><a class="dropdown-item" href="pickup.php">pickup point</a></li>
                        <li><a class="dropdown-item" href="tag.php">categorie</a></li>

                    </ul>
                    </li>
                </ul>
                <a class=" logout-a" href='functions/logout.php' aria-current="page">Logout</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">cerca prodotto per id</button>
                </form>
            </div>
        </div>
    </nav>
    <row>
        <div class="header">        
            <h1>INGREDIENTI</h1>
            <h2>Hi, <?php echo $user[0]->name ?></h2>
        </div>
    </row>
    <div class="row">
        <div class="btn_opt">
            <?php if($id!='NEW'){?>
            <button class="rounded" onClick="location.href = 'ingredient.php?INGREDIENT_ID=NEW'">
                crea nuovo ingrediente
            </button>
            <?php  ;}else if($id=='NEW'){?>
                <button class="rounded" onClick="location.href = 'ingredient.php?INGREDIENT_ID=0'">
                crea nuovo ingrediente
                </button>
                <?php ;}?>
        </div>
    </div> 
    <?php if($_SERVER['REQUEST_METHOD'] == "GET"&& $_GET['INGREDIENT_ID']=='NEW'){
        $ingr_id = 0;?>
    <div class="row table-ingredient">
            <div class="rounded bord_solid col-2 offset-5" >
                <form class="form_" action="" method="post">
                    <label class="lbl-bold" for="text"> inserisci i dati del nuovo ingrediente</label>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="ingr_name" placeholder="nome">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="ingr_descr" placeholder="descrizione">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="ingr_price" placeholder="prezzo">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="ingr_extra" placeholder="extra">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="text" id="" rows="1" name="ingr_quantity" placeholder="quantità">
                    </div>
                    <div class="row form-element">
                        <input class=" col-10 offset-1" type="submit" name="create_tag" value="crea">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }else if ($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['INGREDIENT_ID']!=NULL && $_GET['INGREDIENT_ID']!=0) {?>
    <div class="row table-ingredient">
        <div class="rounded bord_solid col-2 offset-5">
        <?php
            $ingredients=getIngredientById($id);
            if (is_array($ingredients) !== false && count($ingredients) > 0) {
                foreach ($ingredients as $ingr) {?>
                <div class="row">
                    <div class="bord_bottom_solid lbl-bold">
                        ingrediente N° <?php echo $id; ?>
                    </div>
                </div>
                <div class="row col-10 offset-1">
                    <form class="form_" action="" method="post">
                        <label for="text">nome ingredinte:</label>
                        <div class="row form-element"> <input type="text" name="updIngr_name" value="<?php echo $ingr->name;?>"></div>
                        <label for="text">descrizione:</label>
                        <div class="row form-element"> <input type="text" name="updIngr_descr" value="<?php echo $ingr->description;?>"></div>
                        <label for="text">prezzo:</label>
                        <div class="row form-element"> <input type="text" name="updIngr_price" value="<?php echo $ingr->price;?>"></div>
                        <label for="text">extra:</label>
                        <div class="row form-element"> <input type="text" name="updIngr_extra" value="<?php echo $ingr->extra;?>"></div>
                        <label for="text">quantità:</label>
                        <div class="row form-element"> <input type="text" name="updIngr_quantity" value="<?php echo $ingr->quantity;?>"></div>
                        <div class="row form-element"><input type="submit" name="Ingr_upd" value="modifica"></div>
                    </form>
                </div>
        </div>
    </div>
    <?php }}} ?>
    <div class="row">    
    <div class="  col-6 offset-3">
    <table class="table table-striped table-bordered">
        <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th></th>
                </tr>
            </thead>

        <?php
        if (is_array($ingr_arr) !== false && count($ingr_arr) > 0) {
            foreach ($ingr_arr as $total) {
                $ingr_id = $total['id'];
            ?>

        <tbody>
            <tr>
                <td><?php echo $total['id']; ?></td>
                <td><?php echo $total['name']; ?></td>
                <td>
                <a href="http://localhost/progetti_PHP/Progetto-Panini/uffici-paninara/ingredient.php?INGREDIENT_ID=<?php echo $ingr_id;?>">visualizza/modifica</a>
                </td>
            </tr>
        <?php }} ?>

        </tbody>
    </table>

    <?php
    if($id=='NEW' && $_SERVER['REQUEST_METHOD']=='POST' && $_POST['ingr_name']!=NULL && $_POST['ingr_price']!=NULL && $_POST['ingr_descr']!=NULL && $_POST['ingr_quantity']!=NULL){
        setIngredient($_POST['ingr_name'],$_POST['ingr_descr'],floatval($_POST['ingr_price']),intval($_POST['ingr_extra']),intval($_POST['ingr_quantity']));
        echo "<script>alert('prodotto creato');</script>"; 
        echo"<script> window.location.href = 'ingredient.php?INGREDIENT_ID=0'; </script>"; 
    }else if($id=='NEW' && $_SERVER['REQUEST_METHOD']=='POST' && ($_POST['ingr_name']==NULL || $_POST['ingr_price']==NULL || $_POST['ingr_descr']===NULL || $_POST['ingr_quantity']==NULL)){
        echo "<script>alert('errore nell'inserimento dei campi');</script>"; 
        echo"<script> window.location.href = 'ingredient.php?INGREDIENT_ID=0'; </script>"; 
    }

    if($id!='NEW' && $id!='0' && $_SERVER['REQUEST_METHOD']=='POST' && $_POST['updIngr_name']!=NULL && $_POST['updIngr_price']!=NULL && $_POST['updIngr_descr']!=NULL && $_POST['updIngr_quantity']!=NULL){
        updateIngredient($id, $_POST['updIngr_name'], $_POST['updIngr_descr'], floatval($_POST['updIngr_price']), intval($_POST['updIngr_extra']), intval($_POST['updIngr_quantity']));
        echo"<script> window.location.href = 'ingredient.php?INGREDIENT_ID=0'; </script>"; 
    }
    ?>    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>