<?php 
session_start();
include('functions/server.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>ft_apple | Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
	<?php include('css-handler.php');?>
</head>
<body>
<?php
include('header.php');
include('homepage-banner.php');
include('login-core.php');
include('footer.php');
include('functions/admin.php');
$errors = array();
log_in();
?>
</body>
</html>
