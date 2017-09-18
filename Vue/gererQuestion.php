<?php 
include_once('makeform.php');

// MSG ERROR - SUCCESS 
if (isset($_GET['error1'])) {
?>	
	<div class="error alert alert-danger" role="alert" style="text-align: left;">
		L'opération a échouée. Réessayer.
	</div> 
<?php 
}elseif (isset($_GET['success'])) {
?>	
	<div class="success alert alert-success" role="alert" style="text-align: left;">
		Votre question a été supprimée.
	</div> 
<?php 
};


echo "<br />";

//je me sert d'ajax pour renvoyer les question se rapportant au theme via un select
global $bdd;
$query=$bdd->query('SELECT * FROM `Theme` ORDER BY `idTheme` ASC');

$form = "<div class='col-sm-12'>";
$form .= "<label for='idTheme' class='col-sm-2 control-label'>Thème &nbsp</label>";
$form .= "<div class='col-sm-10'>";

$form .= "<select class='col-sm-10 form-control' name='idTheme' onchange='showCheckbox(this.value)'>";
$form .= '<option value ="" selected="">--</option>';	

while ($result=$query->fetch()){
	$form .= '<option value="' .$result['idTheme'] .'">' .' '.$result['theme'] .'</option>';
};
$form .= "</select>";
$form .= "</div><div style='margin-bottom: 55px;'></div>";
$form .= " </div>" ;

$query->closeCursor();
echo $form;


echo "<br /><br /> ";
// je fais un formulaire des valeur renvoyées par ajax dans la div 'retour'
makeFormStart ("./Modele/verifGererQuestion.php", 'POST');
$form = "<div class='col-sm-12'>";
$form .=  "<div id='retour' style='padding-top: 10px;'></div>";
// code pour la fin du formulaire
$form .= "<div class='col-sm-offset-2 col-sm-10'>";	
$form .= "</div>";
$form .= "</div>";
$form .= "</form>";

echo $form;


