<?php
include_once "connexion.config.php";

//Marche
function setTheme($theme){
	global $bdd;
	$req = $bdd -> prepare('INSERT INTO Theme (theme) VALUES(:theme)');
	$req -> execute(array(
		'theme' => $theme,
		));
	$req -> closeCursor();	
};

//Marche
function setStatut($statut){
	global $bdd;
	$req = $bdd -> prepare('INSERT INTO Statut (statut) VALUES(:statut)');
	$req -> execute(array(
		'statut' => $statut,
		));
	$req -> closeCursor();

};


//Marche
function setUser($nom,$prenom, $mail, $login, $motdepasse, $idStatut){
	global $bdd;
	$req = $bdd -> prepare('INSERT INTO User (nom, prenom, mail,login, motdepasse, idstatut) VALUES(:nom, :prenom, :mail, :login, :motdepasse, :idstatut)');
	$req -> execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'mail' => $mail,
		'login' => $login, 
		'motdepasse' => $motdepasse, 
		'idstatut' => $idStatut,
		));
	$req -> closeCursor();

};


//Marche
function setQuestion($question, $idUser, $idTheme){
	global $bdd;
	//je convertis les id en int pour les rentrer dans la base
	$idTheme = intval($idTheme,10);
	$idUser = intval($idUser,10);

	$req = $bdd  ->  prepare('INSERT INTO Question(Question, idProf, idTheme) VALUES (:Question, :idUser, :idTheme)');
	$req -> execute(array(
		'Question' => $question,
		'idUser' => $idUser,
		'idTheme' => $idTheme,
		));
	$req -> closeCursor();

	//je récupère l'id de la question crée
	$req2 = $bdd -> prepare('SELECT idQuestion, Question FROM Question WHERE (Question = :Question)');
	$req2 -> execute(array(
		'Question' => $question,
		));
	$Resultat=$req2 -> fetch();
	$req2 -> closeCursor();
	return $Resultat['idQuestion'];
};

//Marche
function setReponse($idQuestion, $reponse, $statutReponse, $idTheme){
		global $bdd;
		//je convertis les id en int pour les rentrer dans la base
		$idQuestion = intval($idQuestion,10);
		$idTheme = intval($idTheme,10);

	$req = $bdd -> prepare('INSERT INTO Reponse (idQuestion, reponse, statutReponse, idTheme) VALUES(:idQuestion, :reponse, :statutReponse, :idTheme)');
	$req -> execute(array(
		'idQuestion' => $idQuestion,
		'reponse' => $reponse,
		'statutReponse' => $statutReponse,
		'idTheme' => $idTheme,
		));
	$req -> closeCursor();

};
function setQcm($TitreQcm, $idTheme){
	global $bdd;
	//je convertis les id en int pour les rentrer dans la base
	$idTheme = intval($idTheme,10);

	$req = $bdd -> prepare('INSERT INTO QCM (TitreQcm, idTheme) VALUES(:TitreQcm, :idTheme)');

	$req -> execute(array(
		'TitreQcm' => $TitreQcm,
		'idTheme' => $idTheme,
		));
	$req -> closeCursor();


	//je récupère l'id du QCM créé
	$req2 = $bdd -> prepare('SELECT idQcm, TitreQcm FROM QCM WHERE (TitreQcm = :TitreQcm)');
	$req2 -> execute(array(
		'TitreQcm' => $TitreQcm,
		));
	$Resultat=$req2 -> fetch();
	$req2 -> closeCursor();
	return $Resultat['idQcm'];
};


function setFaitQcm($idQcm, $DateLimite, $idQuestion){
	global $bdd;
	//je convertis les id en int pour les rentrer dans la base
	$idQcm = intval($idQcm,10);
	$idQuestion = intval($idQuestion,10);

	$req = $bdd -> prepare('INSERT INTO FAITQcm (idQcm, DateLimite, idQuestion) VALUES(:idQcm, :DateLimite, :idQuestion)');

	$req -> execute(array(
		'idQcm'    => $idQcm, 
		'DateLimite' => $DateLimite,
		'idQuestion' => $idQuestion,
		));
	$req -> closeCursor();

};

function setResultat($idEleve, $idQcm, $idReponse, $points){
	global $bdd;
	//je convertis les id en int pour les rentrer dans la base
	$idEleve = intval($idEleve,10);
	$idQcm = intval($idQcm,10);
	$idReponse = intval($idReponse,10);
	$points = intval($points,10);

	$req = $bdd -> prepare('INSERT INTO Resultat (idEleve, idQcm, idReponse, points) VALUES(:idEleve, :idQcm, :idReponse, :points)');
	$req -> execute(array(
		'idEleve' => $idEleve,
		'idQcm' => $idQcm,
		'idReponse' => $idReponse,
		'points' => $points,
		));
	$req -> closeCursor();

};



