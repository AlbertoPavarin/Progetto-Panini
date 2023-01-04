<?php
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getCategories.php';

session_start();

$user = checkLogin();

$categories = getCategories();

//var_dump($categories);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>Hi, <?php echo $user[0]->name ?></h1> 
        <div>
            <?php
                foreach($categories as $category)
                {
                    echo $category->name . '<br>';
                }
            ?>
        </div>
    </body>
</html>