<?php

session_unset();
session_destroy();
//include_once "vue/entetelogin.php";

?>
<div class="signin">
<!-- 	<h2 class="form-signin-heading"></br></h2>
 -->	<p>Merci pour votre visite. Vous êtes déconnecté.</p>
	<button type="button" onclick="self.location.href='index.php'" class="btn btn-xs btn-primary">Se connecter</button> 
</div>

<?php
//include_once "vue/pieddepage.php";

?>