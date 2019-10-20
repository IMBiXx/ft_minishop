<?php
include("functions/product.php");
include("functions/category.php");
// $category = category_array_by_ID($_GET['id']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple | Mes commandes</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/style.css">
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