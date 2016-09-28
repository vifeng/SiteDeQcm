<?php
htmlentities(extract($_GET));
$header="Bienvenue " .$_SESSION['prenom'] ." " .$_SESSION['nom'];

if (isset($action) && !empty($action)){
  switch ($action) {
    case 'voirQuestions':
      $header="Les Questions par thème";
      break;
    case 'voirToutesQuestions':
      $header="Liste de toutes les Questions";
      break;
    case 'gererQuestion':
      $header="Gérer les questions";
      break;
    case 'creerQuestion':
      $header="Ajouter une question";
      break;
    case 'voirQcm':
      $header="Les Qcm";
      break;
    case 'ajouterQcm':
      $header="Ajouter un Qcm";
      break;  
    case 'resultatsEleve':
      $header="Les résultats des élèves";
      break;
    case 'deconnexion':
      $header="Bye !";
      break;
    default:
      $header="Bienvenue " .$_SESSION['prenom'] ." " .$_SESSION['nom'];
      break;
  }
}
?>
<div class="container">
<div class="row">
  <div class="col-xs-3"></div>
  <div class="col-xs-9 pageTitle"><h1><?php echo $header; ?></h1></div>
  </div>
<div class="row menulecontenu">
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
            <a class="navbar-brand" href="<?php echo WEB_ROOT .'professeur.php'?>">Espace Professeur</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-left">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Questions<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?action=voirToutesQuestions">Voir toutes les questions</a></li>
                  <li><a href="?action=voirQuestions">Voir les questions par thème</a></li>
                  <li><a href="?action=gererQuestion">Gérer les questions</a></li>
                  <li><a href="?action=creerQuestion">Ajouter une question</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Questionnaire<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?action=voirQcm">Voir les QCM</a></li>
                  <li><a href="?action=ajouterQcm">Ajouter</a></li>
                </ul>
              </li>
              <li><a href="?action=resultatsEleve">Résultats des élèves</a></li>
              <li><a href="?action=deconnexion"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>
Se déconnecter</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
  </div>
<div class="col-sm-9 lecontenu">

            