<?php

class Controleur
{

    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)

//debut

//on initialise un tableau d'erreur
        if(!isset($dVueEreur)) $dVueEreur = array();

        try {
            $action = $_REQUEST['action'];

            switch ($action) {

//pas d'action, on r�initialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;
                case "listerNews":
                    $this->Reinit();
                    break;
                case "connectionAdmin":
                    $this->FormulaireConnexion();
                    break;
                case "soumettreConnexion":
                    if(ModeleAdmin::connexion($_REQUEST['id'],$_REQUEST['mdp'], $info)){
                        $_REQUEST['action']="listerFlux";
                        new FrontControleur();
                    }
                    else{
                        $this->FormulaireConnexion($info);
                    }
                    break;

//mauvaise action
                default:
                    $dVueEreur[] = "Erreur requette inconnue";
                    require($rep . $vues['erreur']);
                    break;
            }

        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur PDO inattendue!!! ";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }


//fin
        exit(0);
    }//fin constructeur


    function Reinit()
    {
        global $rep, $vues;
        $nbPage=Modele::nbPage();
        $currentPage=Validation::val_page($_GET['page'],$nbPage);
        $bdNews=Modele::listerNews($currentPage);
        require($rep.$vues['vueNews']);
    }

    function FormulaireConnexion($info=NULL){
        global $rep, $vues;
        require($rep.$vues['vueConnectionAdmin']);
    }

}//fin class

?>
