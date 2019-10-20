<?php
session_start();
?>

<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-large-12">
                <nav class="navbar navbar-expand-large navbar-light">
                    <a class="navbar-brand" href="index.php"> <img class="logo" src="../img/logo.svg" alt="logo"> </a>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Commandes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products-list.php">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="categories-list.php">Catégories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="users-list.php">Clients</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                    <div class="dropdown">
                            <a href="logout.php" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-power-off" title="Panier" alt="panier"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>