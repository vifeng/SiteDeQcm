<?php
echo "<p>Liste des qcm corrigés auxquels j'ai répondu</p>";
$DateLimite=date("Y-m-d");;
$result=selectQcmAvtDate($_SESSION['idUser']);
// $result=selectQcmAvtDate($DateLimite, $_SESSION['idUser']);
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
$res = selectQuestionById($value['idQcm']);
	$form = "<div class='list-group'>";
	foreach ($res as $value){
		$form .= "<div class='list-group-item'>";			
		$form .= "<h4 class='list-group-item-heading'>";
		$form .= htmlentities($value['Question']);
		$form .= "</h4><hr/>";
		$result1 = selectReponseId($value['idQuestion']);
		foreach ($result1 as $value){
			//si le statut de la réponse est '1' donc vrai
			if ($value['statutReponse'] == '1') {
				$form .=  "<p class='list-group-item-text text-corrige'>".htmlentities($value['reponse']) ."</p>";
			}else{
				$form .= "<p class='list-group-item-text text-reponse'>".htmlentities($value['reponse']) ."</p>";
			};
		};
		$form .= "</div>";	
	};
	$form .= "</div>";	
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
