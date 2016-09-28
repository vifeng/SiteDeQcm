<?php

function updateQuestion($question, $idtheme, $idprof){
	$req = $bdd->prepare('UPDATE Question SET (`question`=:question, idTheme=:idTheme, idProf=:idProf)');
	$req->execute(array(
		'question' => $question,
		'idTheme' => $idTheme,
		'idProf' => $idProf,
		));

}

function updateReponse($idQuestion, $reponse, $statutReponse){
	$req = $bdd->prepare('UPDATE Reponse SET (idQuestion=:idQuestion, reponse=:reponse, statutReponse=:statutReponse)');
	$req->execute(array(
		'idQuestion' => $idQuestion,
		'reponse' => $reponse,
		'statutReponse' => $statutReponse,
		));
}


function updateTheme($theme){
	$req = $bdd->prepare('UPDATE Theme SET (theme=:theme)');
	$req->execute(array(
		'theme' => $theme,
		));
}




