<?php
// session_start();
include("functions/product.php");
include("functions/category.php");
include("functions/admin.php");
include("functions/user_interface.php");
// print_r($_POST);
// print_r($GLOBALS['cart']);
if (isset($_POST))
  add_product_to_cart($_POST['id'], $_POST['input-number']);
  print_r($_SESSION['cart']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple | Panier</title>
	<?php include('css-handler.php');?>
</head>
<body>
<?php
include("header.php");
include("cart-banner.php");
include("cart-core.php");
include("footer.php");
?>
    <script src="js/script.js"></script>
</body>
</html>