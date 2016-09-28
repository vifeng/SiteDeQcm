<?php
include_once "Modele/connexion.config.php";
SESSION_START();

$action="";
if (isset($_GET['action'])){
	$action = $_GET['action'];
}


if (isset($_SESSION['idUser'])){
//Page interieures
include_once "Vue/entete.php";	
include_once "Vue/menuEleve.php";
include_once "Modele/Set.php";
include_once "Modele/Select.php";
};

switch ($action){
	case 'qcmAttente':
		require("Vue/qcmAttente.php");
		break;		
	case 'listeQcm':
		require("Vue/listeQcm.php");
		break;
	case 'mesNotes':
		require("Vue/mesNotes.php");
		break;
	case 'deconnexion':
		require("Vue/deconnexion.php");
		break;				
	 default:
		require ("Vue/default.php");
		break;
};

include_once "Vue/pieddepage.php";
