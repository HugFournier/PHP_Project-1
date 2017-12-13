<?php

//gen
$rep=__DIR__.'/../';

$taillePage=10;

// Bootstrap
$front['style'] = "css/style.css";
$front['bootstrap'] = "css/bootstrap.css";

//BD
$base="mysql:host=localhost;dbname=dbhufournier";
$login="hufournier";
$mdp="hufournier";

//Vues
$vues['erreur']='vues/erreur.php';
$vues['vueNews']='vues/vueNews.php';
$vues['vueFlux']='vues/vueFlux.php';
$vues['vueConnectionAdmin']='vues/vueConnectionAdmin.php';

//Actions:
//User:
$actionUser=[NULL,"listerNews","connectionAdmin","soumettreConnexion","changerTaillePage"];
//Admin:
$actionAdmin=["listerFlux","deconnectionAdmin","supprimerFlux","ajouterFlux"];

?>
