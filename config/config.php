<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

/* Damien */
$base = "mysql:host=localhost/~damsng63; dbname=";
$login = "root";
$mdp = "./";

/* Hugo
$base="mysql:host=hina;dbname=dbhufournier";
$login="hufournier";
$mdp="hufournier";
*/

//Vues

$vues['erreur']='vues/erreur.php';
$vues['vuephp1']='vues/vuephp1.php';
$vues['vueNews']='vues/vueNews.php';


?>
