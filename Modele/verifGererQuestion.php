<?php

// TRAITEMENT INSERTION D'UNE QUESTION
include_once "../Modele/Delete.php";
include_once "../Modele/connexion.config.php";

extract($_POST);
	$i = 1;
// Test si une question a été selectionnée	
if (!empty($quest)){
// Test du submit si le bouton cliqué est supprimé ou modifié
	if (isset($_POST['modifier'])) {
		foreach ($quest as $q){
			if ($i == count($quest)){
				//Renvoi sur une page de formulaire de modification
				// puis sur une page de traitement avec les requêtes suivantes
				//updateQuestion($question, $idtheme, $idprof);
				//updateReponse($idQuestion, $reponse, $statutReponse)
			}
			$i++;
		}

	    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&success');
	    exit();

	}elseif (isset($_POST['supprimer'])) {
		foreach ($quest as $q){
			if ($i == count($quest)){
				deleteQuestion($q);
			}
			$i++;
		}
		
	    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&success');
	    exit();
	}else{
		    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&error1');
		    exit();
	}
}else{
	    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&error1');
	    exit();	
}
