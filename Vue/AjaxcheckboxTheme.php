<?php
include_once "../Modele/connexion.config.php";
include_once('../Modele/Select.php');
extract($_GET);


if (!empty($idTheme)){
$idTheme=intval($idTheme);
	// TODO MODELE A ECRIRE
	// echo "<div><button type='submit' name='modifier' value='modifier' class='btn btn-sm btn-warning'><span class='icon-input-btn glyphicon glyphicon-pencil'></span> Modifier</button>";
	echo "<div><span style='margin-left:10px;'></span><button type='submit' name='supprimer' value='supprimer' class='btn btn-sm btn-danger'><span class='icon-input-btn glyphicon glyphicon-trash'></span> Supprimer</button> <span> Attention, vous ne pouvez pas supprimer une question qui a été utilisé dans un qcm. </span></div><br />";

$result=selectQuestionTheme($idTheme);
	$form = "<div class='list-group'>";
	foreach ($result as $value){
		$form .= "<div class='list-group-item'>";			
		$form .= "<h4 class='list-group-item-heading'><input type='checkbox'  name='quest[]' value='";
		$form .= htmlentities($value['idQuestion']) ."' aria-label='...'> ";
		$form .= htmlentities($value['Question']);
		$form .= "</h4><hr/>";
		$result1 = selectReponseId($value['idQuestion']);
		foreach ($result1 as $value){
			//si le statut de la réponse est '1' donc vrai
			if ($value['statutReponse'] == '1') {
				$form .=  "<p class='list-group-item-text text-corrige'>".htmlentities($value['reponse']) ."</p>";
			}else{
				$form .= "<p class='list-group-item-text text-reponse'>".htmlentities($value['reponse']) ."</p>";
			};
		};
		$form .= "</div>";	
	};
	$form .= "</div>";	
	echo $form;
	

}else{
echo "error";
}


