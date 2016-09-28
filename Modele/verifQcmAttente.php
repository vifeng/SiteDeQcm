<?php
session_start();

// TRAITEMENT INSERTION D'UNE QUESTION
include_once "../Modele/Delete.php";
include_once "../Modele/Set.php";
include_once "../Modele/Select.php";
include_once "../Modele/connexion.config.php";

			
extract($_POST);

$idQcm;
$reponse;

// COMPTEURS
// pour parcourir $reponse
$i = 1;

// on demande à l'utilisateur de donner au moins une réponse par question

if ( isset($reponse)
	&& count($reponse) > count($nbquestion)){
	foreach ($reponse as $idReponse){
			$TrueReponse = selectVerifReponse($idReponse);
			$UserReponse = "1";
			//si la réponse choisi est la bonne j'ai un point sinon j'ai 0 point.
			if ($UserReponse == $TrueReponse["0"]) {
				$points = "1";
				setResultat($_SESSION['idUser'], $idQcm, $idReponse, $points);

			}else{
				$points = "0";
				setResultat($_SESSION['idUser'], $idQcm, $idReponse, $points);
			}
	}

	header('Location: ' .WEB_ROOT .'etudiant.php?action=qcmAttente' .'&success');
    exit();

}else{
	header('Location: ' .WEB_ROOT .'etudiant.php?action=qcmAttente' .'&error1');
	exit();
}
