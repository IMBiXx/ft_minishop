<?php
include("functions/product.php");
include("functions/category.php");
// $category = category_array_by_ID($_GET['id']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple | Ma commande order_ID</title>
	<?php include('css-handler.php');?>
</head>
<body>
<?php
include("header.php");
include("my-orders-banner.php");
include("single-order-core.php");
include("footer.php"); 
?>
    <script src="js/script.js"></script>
</body>
</html>