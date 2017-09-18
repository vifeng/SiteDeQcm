<?php
include_once "Modele/connexion.config.php";
//setcookie('nom', 'josette');
setcookie('idProf', '2');
//$_SESSION['user']='jose';
//

$action="";
if (isset($_GET['action'])){
	$action = $_GET['action'];
}

//include_once "Vue/menuEleve.php";

switch ($action){
	case "inscription":
		require "Vue/entetelogin.php";
		require("vue/inscription.php");
		break;
	case 'connexion':
		require "Vue/entetelogin.php";
		require ("vue/connexion.php");
		break;
	 default:
		require "Vue/entetelogin.php";
		require ("vue/connexion.php");
		break;
};


//Footer
//include_once "Vue/footerlogin.php";
include_once "Vue/pieddepage.php";