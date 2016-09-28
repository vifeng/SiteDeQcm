<?php
include "Modele/connexion.config.php";

if(isset($auth)){
	if($auth==1){
	echo '<div class="alert alert-danger" role="alert">
        <strong>Attention !</br></strong>Vous êtes déjà inscrit chez nous ! Cliquez <a href="oubli.php">ici</a> si vous avez oubliez votre mot de passe.</div>';
	}
}
?>
			<form class="form-signin" action="inscription_p2.php" method="POST" name="page_1">
				<h2 class="form-signin-heading">S'inscrire</br></h2>
				<p>Pour vous inscrire à notre club, nous vous remercions de remplir ce petit formulaire.</p>
				<div class="form-group">
					<label for="nom" class="sr-only">Nom</label>
					<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>

					<label for="prenom" class="sr-only">Prénom</label>
					<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
					
					<label for="email" class="sr-only">Email address</label>
					<input type="email" id="email" name="email" class="form-control" placeholder="Adresse mail" required autofocus="">
<?php
// FAIRE UN CHECKBOX POUR LE STATUT
/*					<label for="statut" class="sr-only">Statut</label>
					<input type="text" id="statut" name="statut" class="form-control" placeholder="Etudiant ou Professeur ?" required autofocus="">
*/
?>
				</div>
				<div class="form-group">				
					<label for="code_postal" class="sr-only">Code postal</label>
					<input type="text" id="code_postal" name="code_postal" class="form-control" placeholder="Code postal" autofocus="">

					<label for="ville" class="sr-only">Ville</label>
					<input type="text" id="ville" name="ville" class="form-control" placeholder="Ville" autofocus="">
<?php
$sql="SELECT alpha2, langFR FROM pays ORDER BY langFR";
$resultat=mysqli_query($link, $sql);
echo '<select name="pays" class="form-control">';
echo '<option value="" selected="">--</option>';
while ($rang=mysqli_fetch_array($resultat)){
	$code=$rang['alpha2'];
	$nom=$rang['langFR'];
	echo "<option value=\"$code\">$nom</option>";
	// echo '<option value=' .$code .'>'.$nom .'</option>';
}
echo "</select>";
?>

				</div>
				<button type="submit" class="btn btn-lg btn-primary" onclick="VerifForm()">je m'inscris</button> 

	
			</form>
