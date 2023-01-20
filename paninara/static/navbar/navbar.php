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
                    ordini
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="activeOrder.php">lista attivi</a></li>
                    <li><a class="dropdown-item" href="activeOrderByClass.php">lista attivi per classe</a></li>
                    <li><a class="dropdown-item" href="activeOrdersByPickup.php">lista attivi per punto di ritiro</a></li>
                </ul>
                </li>
            </ul>
            <a class=" logout-a" href='functions/logout.php' aria-current="page">Logout</a>
            <form class="d-flex" role="search" id="searchForm" action="singleOrder.php?ORDER_ID">
                <input class="form-control me-2" name="ORDER_ID" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">cerca odini per id</button>
            </form>
        </div>
    </div>
</nav>