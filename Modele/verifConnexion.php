<?php
include "../Modele/connexion.config.php";

htmlentities(trim(extract($_POST)));
// Hachage du mot de passe
//$mdp_hache = $mdp;

if(isset($mail) && isset($mdp) && !empty($mail) && !empty($mdp)){
	global $bdd;
	$query=$bdd->prepare('SELECT * FROM User WHERE mail = :mail AND motdepasse = :mdp');
	$query->execute(array(
	    'mail' => $mail,
	    'mdp' => $mdp,)
	);
	$result=$query->fetch();
	//var_dump($result);

if (!$result)
{
    header('Location: ' . $_SERVER['HTTP_REFERER'] .'?connexion&error1');


}
else
{
    SESSION_START();
    $_SESSION['idUser'] = $result['idUser'];
    $_SESSION['nom'] = $result['nom'];
    $_SESSION['prenom'] = $result['prenom'];
    $_SESSION['mail'] = $result['mail'];
    $_SESSION['idStatut'] = $result['idStatut'];

	switch ($_SESSION['idStatut']) {
		case '1':
		   	header("Location: ./../professeur.php");
	    	exit();
			break;
		case '2':
    		//echo("location.href ='../etudiant.php'");
    		header("Location: ./../etudiant.php");
    		exit();
			break;
		default:
			header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
			break;
	}
}
	$query->closeCursor();
	$bdd=NULL;
}else{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
};

