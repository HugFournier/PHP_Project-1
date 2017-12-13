<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 29/11/17
 * Time: 13:42
 */
class ControleurAdmin
{
    function __construct()
    {
        global $rep, $vues;

//on initialise un tableau d'erreur
        if(!isset($dVueEreur)) $dVueEreur = array();

        try {
            $action = $_REQUEST['action'];
            if(!ModeleAdmin::isAdmin()){
                $this->Reinit();
            }

            switch ($action) {
                case NULL:
                    $this->Reinit();
                    break;
                case "listerFlux":
                    $this->ListerFlux();
                    break;
                case "ajouterFlux":
                    ModeleAdmin::ajouterFlux($_REQUEST["idFlux"],$_REQUEST["lienFlux"],$info);
                    $this->ListerFlux($info);
                    break;
                case "supprimerFlux":
                    ModeleAdmin::supprimerFlux($_REQUEST['idFlux']);
                    $this->ListerFlux();
                    break;
                case "deconnectionAdmin":
                    ModeleAdmin::deconnexion();
                    $this->Reinit();
                    break;
//mauvaise action
                default:
                    $dVueEreur[] = "Erreur requette inconnue";
                    require($rep . $vues['erreur']);
                    break;
            }

        /*
         } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur PDO inattendue!!! ";
            require($rep . $vues['erreur']);
        */
        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue : ".$e2->getMessage();
            require($rep . $vues['erreur']);
        }
    }//fin constructeur

    function ListerFlux($info=NULL)
    {
        global $rep, $vues;
        $bdFlux=ModeleAdmin::listerFlux();
        require($rep.$vues['vueFlux']);
    }

    function Reinit($info=NULL){
        $_REQUEST['action']="connectionAdmin";
        new FrontControleur();
    }
}