<div>Les bonnes réponses sont en rouge</div><br />
  
<?php

// MSG ERROR - SUCCESS 
if (isset($_GET['error1'])) {
?>	
	<div class="error alert alert-danger" role="alert" style="text-align: left;">
		Votre qcm n'a pas été ajoutée. Réessayer.
	</div> 
<?php 
}elseif (isset($_GET['success'])) {
?>	
	<div class="success alert alert-success" role="alert" style="text-align: left;">
		Votre qcm a été ajoutée.
	</div> 
<?php 
};
echo "<br />";


global $bdd;
	$query=$bdd->query('SELECT * FROM `Theme` ORDER BY `idTheme` ASC');

	$form = "<div class='col-sm-12'>";
	$form .= "<label for='idTheme' class='col-sm-2 control-label'>Thème &nbsp</label>";
	$form .= "<div class='col-sm-10'>";

	$form .= "<select class='col-sm-10 form-control' name='idTheme' onchange='showAjax(this.value)'>";
	$form .= '<option value ="" selected="">--</option>';	

	while ($result=$query->fetch()){
		$form .= '<option value="' .$result['idTheme'] .'">' .' '.$result['theme'] .'</option>';
	};
	$form .= "</select>";
	$form .= "</div><div style='margin-bottom: 55px;'></div>";
	$form .= "</div>" ;
	
	$query->closeCursor();
	echo $form;

?>
<br /><br /><div id='retour' style="padding-top: 10px;"></div>