<?php
include_once ('makeform.php');

// MSG ERROR - SUCCESS 
if (isset($_GET['error1'])) {
?>	
	<div class="error alert alert-danger" role="alert" style="text-align: left;">
		Votre Qcm est incomplet. Vérifiez que vous avez bien répondu à au moins une réponse par question. 
	</div><br /> 
<?php 
}elseif (isset($_GET['error2'])) {
?>	
	<div class="success alert alert-success" role="alert" style="text-align: left;">
		Vous avez déjà rempli ce qcm
	</div><br /> 
<?php 
}elseif (isset($_GET['success'])) {
?>	
	<div class="success alert alert-success" role="alert" style="text-align: left;">
		Votre qcm a été pris en compte. Merci
	</div><br /> 
<?php 
};

//affichage des QCM
$DateduJour=date("Y-m-d"); 
$result=selectQcmApsDate($DateduJour,$_SESSION['idUser']);
?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php
$i=1;
foreach ($result as $value){
?>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
          <?php echo $value['TitreQcm']; ?>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
      <div class="panel-body">
       <?php
// pour afficher la date au format local -> français chez nous
setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
$date = $value['DateLimite'];
echo "<small style='color:blue';>Date limite : " .strftime("%A %d %B %Y", strtotime($date)) ."</small>";
//Fin

makeFormStart ("./Modele/verifQcmAttente.php", 'POST');
	$res = selectQuestionById($value['idQcm']);
	$form = "<div class='list-group'>";
	$form .= "<div class='col-sm-12'>";	
	$form .= createHiddenInputValeur ('idQcm', $value['idQcm']);
	foreach ($res as $value){
		$form .= "<div class='list-group-item'>";			
		$form .= "<h4 class='list-group-item-heading'>";
		$form .= htmlentities($value['Question']);
		$form .= "</h4><hr/>";
		$form .= createHiddenInputValeur ('nbquestion', count($res));
		$result1 = selectReponseId($value['idQuestion']);
		foreach ($result1 as $value){	
			$form .= "<p class='list-group-item-text text-reponse'>";
			$form .= "<input type='checkbox'  name='reponse[]' value='";
			$form .= htmlentities($value['idReponse']) ."' aria-label='...'> ";
			$form .= htmlentities($value['reponse']) ."</p>";
		};
		$form .= "</div>";	
	};
	// code pour la fin du formulaire
	$form .=  "<br /><button type='submit' name='valider' value='valider' class='btn btn-sm btn-primary'><span class='icon-input-btn glyphicon glyphicon-share-alt'></span> Valider</button></div><br />";
	$form .= "</div>";	
	$form .= "</div>";

	$form .= "</form>";
	echo $form;
	

       ?>
      </div>
    </div>
  </div>

<?php
$i++;
}
echo "</div><br/>";


?>
