<?php

header('Content-type: text/html; charset=utf-8');


define('TT_DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/php') ;
define('WEB_ROOT', "php") ;
define('WEBSITE', "***") ;

define('DBHOST', "localhost") ;
define('DBBASE', "***") ;
define('DBUSER', "***") ;
define('DBPASSWD', "***") ;


try {
//connection	
	$bdd = new PDO('mysql:host='.DBHOST.';dbname='.DBBASE, DBUSER, DBPASSWD, array(PDO::ATTR_PERSISTENT => false));
	//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	$bdd->exec('SET CHARACTER SET utf8') ;
}
catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
}

