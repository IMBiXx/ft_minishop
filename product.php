<?php
include("functions/product.php");
include("functions/category.php");
$product = product_array_by_ID($_GET['id']);
if (!$product['product_ID'])
  header("Location: 404.php");
$category = category_array_by_ID($product['category_ID']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple | <?php echo $product['product_name'];?></title>
	<?php include('css-handler.php');?>
</head>
<body>
<?php
include("header.php");
include("product-banner.php");
include("product-core.php");
include("footer.php"); 
?>
    <script src="js/script.js"></script>
</body>
</html>