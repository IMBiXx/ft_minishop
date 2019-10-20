  <div class="header">
  	<h2>Connexion</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('error.php'); ?>
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
