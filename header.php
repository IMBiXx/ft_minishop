<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-large-12">
                <nav class="navbar navbar-expand-large navbar-light">
                    <a class="navbar-brand" href="index.php"> <img class="logo" src="img/logo.svg" alt="logo"> </a>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?id=1">Mac</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?id=2">iPad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?id=3">iPhone</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?id=4">Watch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                    <div class="dropdown">
                            <a href="my-orders.php" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-user" title="Commandes" alt="Commandes"></i>
                            </a>
                            <?php 
                        if (!$_SESSION['loggued_on_user']){
                            echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">
                                    <a class="dropdown-item" href="register.php">Inscription</a>
                                    <a class="dropdown-item" href="login.php">Connexion</a>
                                </div>
                            </div>';
                        } ?>
                        </div>
                        <?php 
                        if ($_SESSION['loggued_on_user']){
                            echo '<a href="logout.php">
                                <i class="ti-power-off" title="Déconnexion" alt="Déconnexion"></i>
                            </a>';} ?>
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="cart.php" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-bag" title="Panier" alt="panier"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">
                                    <!-- <a class="dropdown-item" href="#">Cart content</a> -->
                                <?php include("cart-light-core.php");?>
                                </div>
                            </div> 
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
