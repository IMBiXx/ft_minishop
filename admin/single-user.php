<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
	<?php include('css-handler.php');?>
</head>
<body>
  <?php 

include("../functions/product.php");
include("../functions/category.php");
include("../functions/admin.php");
$user = user_array_by_ID($_GET['id']);
?>
<?php
include("admin-header.php");
include("admin-banner.php");
include("single-user-core.php");
?>
<?php
include("../footer.php");
?>
</body>
</html>