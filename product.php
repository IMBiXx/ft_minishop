<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple</title>
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include("functions/product.php");
include("functions/category.php");
$product = product_array_by_ID($_GET['id']);
if (!$product['product_ID'])
  header("Location: 404.php");
$category = category_array_by_ID($product['category_ID']);

include("header.php");
include("product-banner.php");
include("product-core.php");
include("footer.php"); 
?>
    <script src="js/script.js"></script>
</body>
</html>