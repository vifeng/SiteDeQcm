
<div class="signin center-block">
	<form class="form-signin" action="modele/verifConnexion.php" method="POST" name="page_1">
		<h2 class="form-signin-heading">Se connecter</br></h2>
		<p></p>
		<div class="form-group">
			<label for="mail" class="sr-only">Mail</label>
			<input type="text" class="form-control" id="mail" name="mail" placeholder="Votre mail" required>

			<label for="mdp" class="sr-only">Password:</label>
			<input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe" required autofocus="">
		</div>
		<button type="submit" class="btn btn-lg btn-primary">Me connecter</button> 
	</form>
	<br />
	<?php 
	if (isset($_GET['error1'])) {
	?>	
	<div class="error alert alert-danger" role="alert" style="text-align: center;">
		Mauvais mail ou mot de passe.<br/>Réessayer encore.</div> 
	<?php }?>	
</div>	

	
	


