<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';
include_once dirname(__FILE__) . '/functions/getCategories.php';

$user = checkLogin();

$categories = getCategories();

?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Index</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <header class="">
            <nav class="nav container-ns">
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list ul">
                        <li class="nav__item pt-2">
                            <a href="#home" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="#skills" class="nav__link">
                                <i class='bx bx-book-alt nav__icon'></i>
                                <span class="nav__name">Skills</span>
                            </a>
                        </li>
                        <li class="nav__item pt-2">
                            <a href="#contactme" class="nav__link">
                                <i class='bx bx-message-square-detail nav__icon'></i>
                                <span class="nav__name">Contactme</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <img src="assets/img/perfil.png" alt="" class="nav__img">
            </nav>
        </header>
        <main>
            <div class="">
                <?php foreach($categories as $category)
                { ?>
                    <section class="container-ns section section__height mb-3" id="home">
                        <h2 class="section__title"><?php echo ucfirst($category->name) ?></h2>
                    </section>
                <?php
                }
                ?>
            </div>
        </main>
        </main>
    </body>

</html>