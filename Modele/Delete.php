<?php
/*
function SupprimerUneLigne($table, $primaryKey, $idtable){
	global $bdd;
	$sql = "DELETE FROM :table WHERE :primaryKey = :idtable";
	$req = $bdd->prepare($sql);
	$req->bindParam('table', $table, PDO::PARAM_STR);
	$req->bindParam('primaryKey', $primaryKey, PDO::PARAM_STR);
	$req->bindParam('idtable', $idtable, PDO::PARAM_INT);   

	if (!$req->execute()) {
        echo "\nPDO::errorInfo():\n";
        print_r($db->errorInfo());
    }
}*/



function deleteQuestion($idtable){
	global $bdd;
	$req = $bdd->prepare('DELETE FROM Question WHERE idQuestion = :idtable');
	$req->execute(array(
		'idtable' => $idtable
		));
}