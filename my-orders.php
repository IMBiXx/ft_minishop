<?php
session_start();
include("functions/product.php");
include("functions/category.php");
include("functions/user_interface.php"); 
include("functions/admin.php");
$orders = array();
$orders = list_user_orders($_SESSION['user_ID']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple | Mes commandes</title>
  <?php include('css-handler.php');?>
</head>
<body>
<?php
include("header.php");
include("my-orders-banner.php");
include("my-orders-core.php");
include("footer.php"); 
?>
    <script src="js/script.js"></script>
</body>
</html>