<?php


//TRAITEMENT INSERTION D'UNE QUESTION
include_once "../Modele/Set.php";

htmlspecialchars(extract($_POST));
//var_dump($question,$idUser, $idTheme);

if (null!==extract($_POST) && !empty(trim(extract($_POST)))){
	//j'insère une question et je récupère son id en même temps
	$idQuestion=setQuestion($question, $idUser, $idTheme);

	//selon le statut de la réponse j'écris '1' pour vrai ou '0' pour faux et j'insère le tout dans la base.
	$reponse1=$reponse1;
	($statutReponse1==='statutReponse11')?$statutReponse1='1':$statutReponse1='0';
	$statutReponse1=$statutReponse1;
	setReponse($idQuestion,$reponse1,$statutReponse1,$idTheme);

	$reponse2=$reponse2;
	($statutReponse2==='statutReponse21')?$statutReponse2='1':$statutReponse2='0';
	$statutReponse2=$statutReponse2;
	setReponse($idQuestion,$reponse2,$statutReponse2,$idTheme);	

	$reponse3=$reponse3;
	($statutReponse3==='statutReponse31')?$statutReponse3='1':$statutReponse3='0';
	$statutReponse3=$statutReponse3;
	setReponse($idQuestion,$reponse3,$statutReponse3,$idTheme);

    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&success');
    exit();

}else{
	    header('Location: ' . $_SERVER['HTTP_REFERER'] .'&error1');
	    exit();

};