<?php include('functions/server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ft_apple | Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Inscription</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Adresse e-mail</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Mot de passe</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmer le mot de passe</label>
  	  <input type="password" name="password_2">
      </div>
      <div class="input-group">
  	  <label>Prénom</label>
  	  <input type="text" name="fist_name" value="<?php echo $firstname; ?>">
      </div>
      <div class="input-group">
  	  <label>Nom</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group btn-center">
  	  <button type="submit" class="btn_2" name="reg_user">Inscription</button>
  	</div>
  	<p>
  		Déjà inscrit ? <a href="login.php">Se connecter</a>
  	</p>
  </form>
</body>
</html>