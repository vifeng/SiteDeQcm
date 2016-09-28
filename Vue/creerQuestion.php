
<?php
include_once "vue/makeForm.php"; 

// MSG ERROR SUCCESS 
if (isset($_GET['error1'])) {
?>	
	<div class="error alert alert-danger" role="alert" style="text-align: left;">
		Votre question n'a pas été ajoutée. Réessayer.
	</div> 
<?php 
}elseif (isset($_GET['success'])) {
?>	
	<div class="success alert alert-success" role="alert" style="text-align: left;">
		Votre question a été ajoutée.
	</div> 
<?php 
}
echo "<br />";


//FORMULAIRE QUESTION+3 reponses
makeFormStart('./modele/verifQuestion.php','POST');
selectTheme();
$tab = array(
	'' =>'' ,
	'Question' =>'question' ,
	);
createInput ($tab);
createHiddenInput("idUser");

$nbreponses=3;
for ($i=1; $i <= $nbreponses; $i++) { 
	createTextArea("Réponse ".$i,"reponse".$i);
	$tab=['','vrai', 'faux'];
	createRadioCheckbox(2, $tab,"statutReponse".$i);
};

makeFormEnd ('envoyer');

	

