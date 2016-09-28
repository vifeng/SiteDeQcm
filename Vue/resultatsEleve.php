<?php
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <!-- Table -->
	<table <table class="table table-hover">
		<thead> 
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Pourcentage de réussite moyen</th>
			</tr>
		</thead>
	    <tbody>
	    <?php
	    $nbEleve = ElevesTableResultat();
	    foreach ($nbEleve as $value) {
	    	
		$Pourc = Resultat1Eleve($value['idEleve']);
	    //COMPTEUR pour le pourcentage moyen
	    $totalPourc = "0";
	    $nbqcm = "0";
	    //je calcul le pourcentage moyen
	    foreach ($Pourc as $value){
	    	// je formate mon nombre pour avoir 45% et non 0.45
	    	$formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
	    	$monpourcentage = $formatter->format($value['pourcentage']);
    		$totalPourc += $monpourcentage ;
    		$nbqcm++;
    	}
		$pourcMoy = $totalPourc / $nbqcm; 	

    	?>
	    	<tr>
		    	<td><?php echo $value['nom'] ?></td>
		    	<td><?php echo $value['prenom'] ?></td>
				<td><?php echo $pourcMoy ?>%</td>
			</tr>
	    <?php
		}		
		?>
		</tbody>
	</table>
</div>
 