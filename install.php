<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Installation du projet</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
	<?php include('css-handler.php');?>
</head>
<body>
<div class="header">
  	<h2>Installation</h2>
  </div>
	 
  <form method="post" action="install-process.php">
  	<?php include('error.php'); ?>
  	<div class="input-group">
  		<label>host</label>
  		<input type="text" name="host" value="localhost:3306">
      </div>
      <div class="input-group">
  		<label>db name</label>
  		<input type="text" name="db_name" value="rush00">
      </div>
      <div class="input-group">
  		<label>db user</label>
  		<input type="text" name="db_user" value="root">
  	</div>
  	<div class="input-group">
  		<label>password</label>
  		<input type="password" name="password" value="root">
  	</div>
  	<div class="input-group btn-center">
  		<button type="submit" class="btn_2" name="login_user">Installer</button>
  	</div>
  </form>

</body>
</html>
