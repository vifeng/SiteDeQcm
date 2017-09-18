<?php 
//Fonction pour créer des formulaires

//crée autant d'input que le tab passé en paramètre 
//(le type dépends du label - par défaut text)
// prends en compte les cookies if existant 
function createInput ($tab, $type='text', $maxlength='', $size='',$sep="<br />", $placeholder=''){
	$form="";
		foreach ($tab as $labelAccent => $label) {
			if ($labelAccent==''){}else{
			if ($label==='mdp' || $label=='confmdp') {
				$type = 'password';
			}else{};

			$form .= "<label for='$label' class='col-sm-2 control-label'>$labelAccent &nbsp</label>";
			$form .= "<div class='col-sm-10'>";
			$form .= "<input type='$type' name='$label' value='";
			if (isset($_COOKIE[$label])) {
				$form .= $_COOKIE[$label];
			}else{ $form .= '';};
			$form .= "' class='form-control' id='$label' maxlength='$maxlength' size='$size' placeholder='$placeholder' required='required'/>";
			$form .= $sep ."</div>".$sep ;
			};	
		};	
	echo $form;
};

function createHiddenInputValeur ($label, $valeur){
		$form = "<input type='hidden' name='$label' value='".$valeur;
		$form .= "' class='form-control' id='$label' placeholder='' required='required'/>";
	echo $form;

};

function createHiddenInput ($label, $labelAccent="", $type='hidden', $sep="<br />", $placeholder=''){
	$form="<div class='col-sm-12'>";
		$form .= "<label for='$label' class='col-sm-2 control-label'>$labelAccent &nbsp</label>";
		$form .= "<div class='col-sm-10'>";
		$form .= "<input type='$type' name='$label' value='";
		if (isset($_SESSION[$label])) {
			$form .= $_SESSION[$label];
		}else{ $form .= '';};
		$form .= "' class='form-control' id='$label' placeholder='$placeholder' required='required'/>";
		$form .= $sep ."</div></div>";
	echo $form;
};


//crée autant de input radio que voulu. - $css='radio' or 'checkbox' if not wanted in line
//$tab est un tableau des options à choisir. ATTENTION laisse sa première case vide
function createRadioCheckbox ($nbopt, $tab, $label, $type='radio', $css='-line', $sep="<br />"){
	$form = "<div class=' col-sm-offset-2 col-sm-10'>";
	for ($i=01; $i<=$nbopt;$i++) {	
		$form .= "<label class= 'col-sm-2 " .$type .$css ."'>";
		$form .= "<input type='$type' name='$label' id='".$label .$i ."' value='";
		if (isset($_COOKIE[$label])) {
			$form .= $_COOKIE[$label];
		}else{ $form .= "".$label .$i;};
		$form .= "' required='required'/>";
		$form .= "&nbsp" .$tab[$i];
		$form .= "</label>";
	};	
	$form .= $sep  ."</div>&nbsp".$sep ;
	echo $form;
};


//Créer un textarea
function createTextArea ($labelAccent, $label, $sep="<br />", $placeholder=''){
	$form = "<div class='col-sm-12'>";
	$form = "<label for='$label' class='col-sm-2 control-label'>$labelAccent &nbsp</label>";
	$form .= "<div class='col-sm-10'>";
	$form .= "<textarea class='form-control' name='$label' rows='3' value='";
	if (isset($_COOKIE[$label])) {
		$form .= $_COOKIE[$label];
	}else{ $form .= '';};
	$form .= "' id='$label' placeholder='$placeholder' required='required'></textarea>";
	$form .= $sep ."</div>" ;
	echo $form;
};



function makeFormStart ($path, $method){
	$form = "<form action='".$path ."'method= '$method' class='form-horizontal'>";
	$form .= "<div class='form-group'>";
	echo $form;
};	


function makeFormEnd ($value,$sep="<br />"){

	$form = "<div class='col-sm-offset-2 col-sm-10'>";	
	$form .= "<input type='submit' name='submit' value='$value' class='btn btn-sm btn-primary'/>";
	$form .= "</div>";
	$form .= "</div>";
	$form .= "</form>";

	echo $form;
};		

