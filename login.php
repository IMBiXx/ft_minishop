<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>ft_apple | Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Connexion</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>E-mail</label>
  		<input type="email" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Mot de passe</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group btn-center">
  		<button type="submit" class="btn_2" name="login_user">Connexion</button>
  	</div>
  	<p>
  		Pas encore inscrit ? <a href="register.php">S'inscrire</a>
  	</p>
  </form>
</body>
</html>