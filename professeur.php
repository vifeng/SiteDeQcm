<?php
include_once "Modele/connexion.config.php";
SESSION_START();
//setcookie('nom', 'josette');
//setcookie('idProf', '2');
//$_SESSION['user']='jose';
//

$action="";
if (isset($_GET['action'])){
	$action = $_GET['action'];
}

if (isset($_SESSION['idUser'])){
//Page interieures
include_once "vue/entete.php";
include_once "vue/menuEnseignant.php";

//include_once "modele/Set.php";
include_once "modele/Select.php";
}

switch ($action){
	case 'voirQuestions':
		require("vue/voirQuestions.php");
		break;
	case 'voirToutesQuestions':
		require("vue/voirToutesQuestions.php");
		break;
	case 'gererQuestion':
		require("vue/gererQuestion.php");
		break;
	case 'creerQuestion':
		require("vue/creerQuestion.php");
		break;
	case 'voirQcm':
		require("vue/voirQcm.php");
		break;
	case 'ajouterQcm':
		require("vue/ajouterQcm.php");
		break;
	case 'resultatsEleve':
		require("vue/resultatsEleve.php");
		break;
	case 'deconnexion':
		require ("vue/deconnexion.php");
		break;					
	 default:
		require ("./vue/default.php");
		break;
};



include_once "vue/pieddepage.php";
