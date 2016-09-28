<div>Les bonnes réponses sont en rouge</div><br />
  

<?php

$result=selectQuestion();

$form = "<div class='list-group'>";
foreach ($result as $value){
	// print_r($value['idQuestion']);

	$form .= "<div class='list-group-item'>";			
	$form .= "<h4 class='list-group-item-heading'>";
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
