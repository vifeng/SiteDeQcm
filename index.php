
<?php
include_once "Modele/connexion.config.php";
// setcookie('idProf', '2');


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