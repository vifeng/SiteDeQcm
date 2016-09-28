<?php
?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <!-- Table -->
	<table <table class="table table-hover">
		<thead> 
			<tr>
				<th>Nom du Qcm</th>
				<th>Mon Pourcentage de réussite</th>
			</tr>
		</thead>
	    <tbody>
	    <?php
		$resultats = Resultat1Eleve($_SESSION['idUser']);
	    //COMPTEUR pour le pourcentage moyen
	    $totalPourc = "0";
	    $nbqcm = "0";
	    foreach ($resultats as $value){
	    	// je formate mon nombre pour avoir 45% et non 0.45
	    	$formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
	    	$monpourcentage = $formatter->format($value['pourcentage']);
    		$totalPourc += $monpourcentage ;
    		$nbqcm++;
    	?>
	    	<tr>
		    	<td><?php echo $value['TitreQcm'] ?></td>
				<td><?php echo $monpourcentage ?></td>
			</tr>
	    <?php
		}		
		$pourcMoy = $totalPourc / $nbqcm; 	
		?>
		</tbody>
	</table>
  <div class="panel-heading">Mon pourcentage moyen est de : <?php echo $pourcMoy ?>%</div>

</div>