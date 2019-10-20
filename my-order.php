<?php
session_start();
include("functions/product.php");
include("functions/category.php");
include("functions/user_interface.php"); 
include("functions/admin.php");
$orders = list_user_orders($_SESSION['user_ID']);
foreach ($orders as $elem) {
  if ($elem['order_ID'] === $_GET['id'])
    $order = $elem;
}
$order_details = get_user_order($_SESSION['user_ID'], $_GET['id']);
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