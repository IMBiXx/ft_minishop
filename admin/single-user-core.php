<section class="order_list_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-large-12">
          <div class="order_details_iner">
            <h3>Page utilisateur : <?php echo $user['user_email'];?></h3>
            <div class="header">
	<h2>Modifier</h2>
</div>
            <form method="post" action="user-edit.php">
	<?php include('error.php'); ?>
            <div class="input-group">
		<label>Adresse e-mail</label>
		<input type="email" name="email" value="<?php echo $user['user_email']; ?>">
	</div>
	<div class="input-group">
		<label>Mot de passe</label>
		<input type="password" name="user_pass">
	</div>
	<div class="input-group">
		<label>Prénom</label>
		<input type="text" name="fist_name" value="<?php echo $user['user_firstname']; ?>">
	</div>
	<div class="input-group">
		<label>Nom</label>
		<input type="text" name="name" value="<?php echo $user['user_name']; ?>">
	</div>
	<div class="input-group btn-center">
		<button type="submit" class="btn_2" name="edit">Modifier</button>
    </div>
    </form>            <div class="header">
	<h2>Supprimer</h2>
</div>
    <form method="post" action="user-edit.php">
        <div class="input-group btn-center">
        <p>Supprimer l'utilisateur</p>
            <button type="submit" class="btn_2" name="delete">Supprimer</button>
        </div>
    </form>
          </div>
        </div>
      </div>
    </div>
  </section>