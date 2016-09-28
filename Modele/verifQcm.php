<?php

//TRAITEMENT INSERTION D'UNE QUESTION
include_once "../Modele/Set.php";

htmlspecialchars(extract($_POST));

if (null!==extract($_POST) && !empty(trim(extract($_POST)))){
	$nbquestion=intval($nbquestion);
	$idQcm=setQCM($TitreQcm, $idTheme);

	//pour créer des variables autant qu'il a de questions et donc de ligne dans ma base FAITQCM
	while ($nbquestion>0) {
		setFaitQcm($idQcm, $DateLimite, ${'idQuestion'.$nbquestion});
		$nbquestion = $nbquestion-1;
	};
	
    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&success');
    exit();
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&error1');
    exit();

};