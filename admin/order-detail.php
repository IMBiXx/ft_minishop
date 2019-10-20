<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ft_apple</title>
	<?php include('css-handler.php');?>
</head>
<body>
  <?php 

include("../functions/product.php");
include("../functions/category.php");
include("../functions/user_interface.php");
include("../functions/admin.php");
$order_details = user_order_details_array($_GET['id']);
$orders = orders_array_by_ID($_GET['id']);
foreach ($orders as $elem) {
  if ($elem['order_ID'] === $_GET['id'])
    $order = $elem;
}
?>
<?php
include("admin-header.php");
include("admin-banner.php");
include("order-detail-core.php");
?>
<?php
include("../footer.php");
?>
</body>
</html>