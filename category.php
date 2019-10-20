<?php
include("functions/product.php");
include("functions/category.php");
$category = category_array_by_ID($_GET['id']);
if (!$category['category_ID'])
  header("Location: 404.php");
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple | <?php echo $category['category_name'];?></title>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include("header.php");
include("category-banner.php");
include("category-core.php");
include("footer.php"); 
?>
    <script src="js/script.js"></script>
</body>
</html>