<?php
include_once "vue/makeForm.php"; 

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

//je demande quel thème et combien de questions
makeFormStart('','POST');
selectTheme();
$tab0 = array(
	'' =>'' ,
	'Nombre<br/>de Questions' =>'nbquestion' ,
	);
createInput($tab0,'text','2','2');
makeFormEnd ('choisir');
echo"<hr/>";

htmlspecialchars(extract($_POST));

//Si nbquestion a bien été rempli je fais un formulaire avec le nb de questions voulues.
if (null!==extract($_POST) && !empty(trim(extract($_POST)))){
	$idTheme = intval($idTheme);
	$nbquestion = $_POST['nbquestion'];
	$nbquestion=intval($nbquestion);
	$theme = selectThemeid($idTheme);
	echo "<div>Vous avez choisi de faire un questionnaire pour le thème : <b>" .$theme['theme'] ."</b></div>";


	makeFormStart('./modele/verifQcm.php','POST');
		createHiddenInputValeur('idTheme',$idTheme);
		createHiddenInputValeur('nbquestion', $nbquestion);

		$tab1 = array(
			'' =>'',
			'Titre du QCM' =>'TitreQcm',
			);
		createInput($tab1);

		$tab2 = array(
			'' =>'',
			'Date limite' => 'DateLimite',
			);
		createInput ($tab2, $type='date', '10', '10',$sep="<br />");

		for ($i=1; $i <= $nbquestion; $i++) { 	
			$result=selectQuestionTheme($idTheme);
			$form = "<div class='col-sm-12'>";
			$form .= "<label for='question".$i ."' class='col-sm-2 control-label'>Question &nbsp" .$i ."</label>";
			$form .= "<div class='col-sm-10'>";
			$form .= "<select class='col-sm-10 form-control' name='idQuestion".$i ."'>";
			$form .= "<option value ='' selected=''>--</option>";
			foreach ($result as $value){
				$form .= "<option value='".$value['idQuestion'] ."'>" .$value['Question'] ."</option>";
			};
			$form  .= "</select>";
			$form .= "</div><div style='margin-bottom: 55px;'></div>";
			$form .= "</div>";
			echo $form;
		};
	makeFormEnd ('envoyer');
}else{
    
};