<?php

function selectTheme(){
	global $bdd;
	$query=$bdd->query('SELECT * FROM `Theme` ORDER BY `idTheme` ASC');

	$form = "<div class='col-sm-12'>";
	$form .= "<label for='idTheme' class='col-sm-2 control-label'>Thème &nbsp</label>";
	$form .= "<div class='col-sm-10'>";
	$form .= "<select class='col-sm-10 form-control' name='idTheme'>";
	$form .= '<option value ="" selected="">--</option>';	

	while ($result=$query->fetch()){
		$form .= '<option value="' .$result['idTheme'] .'">' .' '.$result['theme'] .'</option>';
	};
	$form .= "</select>";
	$form .= "</div><div style='margin-bottom: 55px;'></div>";
	$form .= "</div>" ;
	
	$query->closeCursor();
	echo $form;
	//return $result;
};



function selectThemeid($idTheme){
	global $bdd;
	$idTheme=intval($idTheme);
	$query=$bdd->prepare('SELECT theme FROM `Theme` WHERE  `idTheme` = (:idTheme)');
	$query -> execute(array(
		':idTheme' => $idTheme,
		));
	$result=$query->fetch();
	$query->closeCursor();
	return $result;
};

function selectQuestion(){
	global $bdd;
	$query=$bdd->query('SELECT * FROM `Question` ORDER BY Question.`idQuestion` DESC');
	$result=$query->fetchAll();
	$query->closeCursor();
	return $result;
};


function selectQuestionById($idQcm){
	global $bdd;
	$query=$bdd->prepare('SELECT * FROM `Question` Q,`FAITQCM` F WHERE F.idQuestion = Q.idQuestion AND F.idQcm = :idQcm');
	$query -> execute(array(
		':idQcm' => $idQcm,
		));
	$result=$query->fetchAll();
	$query->closeCursor();
	return $result;
};


function selectQuestionTheme($idTheme){
	global $bdd;
	$idTheme=intval($idTheme);
	$query=$bdd->prepare('SELECT * FROM `Question` WHERE `idTheme` = :idTheme ORDER BY `idQuestion` DESC');
	$query -> execute(array(
		':idTheme' => $idTheme,
		));
	$query=$query->fetchAll();
	return $query;
};


function selectReponse(){
	global $bdd;
	$query=$bdd->query('SELECT * FROM `Question`, `Reponse`  WHERE Question.`idQuestion` = Reponse.`idQuestion` ORDER BY Question.`idQuestion` DESC');
	$result=$query->fetchAll();
	$query->closeCursor();
	return $result;
};

function selectVerifReponse($idReponse){
	global $bdd;
	$query = $bdd -> prepare('SELECT statutReponse FROM `Reponse`  WHERE idReponse = :idReponse');
 	$query -> execute(array(
		'idReponse' => $idReponse,
		));
	$result=$query->fetch();
	$query->closeCursor();
	return $result;
};

function selectReponseId($idQuestion){
	global $bdd;
	$idQuestion=intval($idQuestion);
	$query=$bdd->prepare('SELECT idReponse, reponse, statutReponse FROM `Reponse`  WHERE `idQuestion` = (:idQuestion) ORDER BY `idQuestion` DESC');
	$query -> execute(array(
		'idQuestion' => $idQuestion,
		));
	$result=$query->fetchAll();
	$query->closeCursor();
	return $result;
};


function selectQcmTheme($theme){
	global $bdd;
	$theme = intval($theme);
	$query = $bdd -> prepare('SELECT * FROM `QCM` WHERE  `idTheme` = (:theme) ORDER BY `idQcm` DESC');
	$query -> execute(array(
		':theme' => $theme,
		));
	$query = $query->fetchAll();
	//$query->closeCursor();
	return $query;
};


function selectQcm(){
	global $bdd;
	$query = $bdd->query('SELECT DISTINCT Q.idQcm, Q.TitreQcm, Q.idTheme, F.DateLimite FROM `QCM` Q, `FAITQCM` F WHERE Q.idQcm = F.idQcm ORDER BY F.`idQcm` DESC');
	$result=$query->fetchAll();
	//$query->closeCursor();
	return $result;
};


/*//selectionne tous les questionnaires après une date définie
function selectQcmAvtDate($DateLimite){
	global $bdd;
	$query = $bdd->prepare('SELECT DISTINCT Q.idQcm, Q.TitreQcm, Q.idTheme, F.DateLimite FROM `QCM` Q, `FAITQCM` F WHERE Q.idQcm = F.idQcm AND DateLimite < :DateLimite ORDER BY F.`idQcm` DESC');
	$query -> execute(array(
		':DateLimite' => $DateLimite,
		));
	$result=$query->fetchAll();
	//$query->closeCursor();
	return $result;
};

*/
//selectionne tous les questionnaires pour lesquels l'utilisateur a fait les qcm
function selectQcmAvtDate($idUser){
	global $bdd;
	$sql = "SELECT DISTINCT Q.idQcm, Q.TitreQcm, Q.idTheme, F.DateLimite 
			FROM `QCM` Q, `FAITQCM` F 
			WHERE Q.idQcm = F.idQcm 
				AND Q.idQcm IN (
					SELECT DISTINCT Q.idQcm 
					FROM Resultat R, QCM Q
					WHERE R.idQcm =Q.idQcm
					AND R.idEleve = :idUser) 
			ORDER BY F.DateLimite DESC";
	$query = $bdd->prepare($sql);
	$query -> execute(array(
		':idUser' => $idUser,
		));
	$result=$query->fetchAll();
	//$query->closeCursor();
	return $result;
};


//selectionne tous les questionnaires après une date définie et pour lesquels l'utilisateur n'a pas fait de qcm
function selectQcmApsDate($DateLimite, $idUser){
	global $bdd;
	$sql = "SELECT DISTINCT Q.idQcm, Q.TitreQcm, Q.idTheme, F.DateLimite 
			FROM `QCM` Q, `FAITQCM` F 
			WHERE Q.idQcm = F.idQcm 
				AND DateLimite > :DateLimite  
				AND Q.idQcm NOT IN (
					SELECT Q.idQcm 
					FROM Resultat R, QCM Q
					WHERE R.idQcm =Q.idQcm
					AND R.idEleve = :idUser) 
			ORDER BY F.`idQcm` DESC";
	$query = $bdd->prepare($sql);
	$query -> execute(array(
		':DateLimite' => $DateLimite,
		':idUser' => $idUser,
		));
	$result=$query->fetchAll();
	//$query->closeCursor();
	return $result;
};

//Résultat moyen par qcm pour un élève
function Resultat1Eleve($idEleve){
	global $bdd;
	$sql = "SELECT nom, prenom, TitreQcm, AVG(`points`) pourcentage FROM Resultat R, QCM Q, User U WHERE R.`idQcm` = Q.`idQcm` AND R.`idEleve` = U.`idUser` AND R.`idEleve` = :idEleve GROUP BY R.`idQcm`";
	$query = $bdd->prepare($sql);
	$query -> execute(array(
		':idEleve' => $idEleve,
		));
	$result=$query->fetchAll();
	//$query->closeCursor();
	return $result;
}

//Renvoi les eleves par ayant fait au moins un qcm
function ElevesTableResultat(){
	global $bdd;
	$sql = "SELECT idEleve, nom, prenom FROM Resultat R, User U WHERE R.`idEleve` = U.`idUser` GROUP BY R.`idEleve`";
	$query = $bdd->query($sql);
	$result=$query->fetchAll();
	//$query->closeCursor();
	return $result;
}

