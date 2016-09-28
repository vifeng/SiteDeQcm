<?php

htmlentities(extract($_GET));
$header="Bienvenue " .$_SESSION['prenom'] ." " .$_SESSION['nom'];

if (isset($action) && !empty($action)){
  $header="";
  switch ($action) {
    case 'qcmAttente':
      $header="Mes Qcm en attente";
      break;
    case 'listeQcm':
      $header="Mes anciens Qcm";
      break;
    case 'mesNotes':
      $header="Mes notes";
      break;
    case 'deconnexion':
      $header="Bye !";
      break;
    default:
      $header="Bienvenue " .$_SESSION['prénom'] ." " .$_SESSION['nom'];
      break;
  }
}  
?>

<div class="container">
<div class="row">
  <div class="col-xs-3"></div>
  <div class="col-xs-9 pageTitle"><h1><?php echo $header; ?></h1></div>
</div>
<div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="bootstrap-vertical-nav">
        <nav class="navbar navbar-default" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo WEB_ROOT .'etudiant.php'?>">Espace Etudiant</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-left">
              <li><a href="?action=qcmAttente">Mes QCM en attente</a></li>
              <li><a href="?action=listeQcm">Mes anciens QCM</a></li>
              <li><a href="?action=mesNotes">Mes notes</a></li>
               <li><a href="?action=deconnexion"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Se déconnecter</a></li>
           </ul>
          </div><!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
  </div>
<div class="col-sm-9 lecontenu">
            <!-- Body -->