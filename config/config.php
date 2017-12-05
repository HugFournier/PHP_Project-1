<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



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
$actionUser=[NULL,"listerNews"];
//Admin:
$actionAdmin=["connectionAdmin","soumettreConnexion","listerFlux","deconnectionAdmin","supprimerFlux","ajouterFlux"];

?>
