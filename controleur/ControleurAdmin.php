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

        session_start();

//on initialise un tableau d'erreur
        if(!isset($dVueEreur)) $dVueEreur = array();

        try {
            $action = $_REQUEST['action'];
            /*if($action!="connectionAdmin" && !ModeleAdmin::isAdmin()){
                $action="connectionAdmin";
            }*/

            switch ($action) {
                case NULL:
                    $this->Reinit();
                    break;
                case "connectionAdmin":
                    $this->Reinit();
                    break;
                case "soumettreConnexion":
                    if(ModeleAdmin::connexion($_REQUEST['id'],$_REQUEST['mdp'], $info)){
                        $this->ListerFlux();
                    }
                    else{
                        $this->Reinit($info);
                    }
                    break;
                case "listerFlux":
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

        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur PDO inattendue!!! ";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }//fin constructeur

    function ListerFlux()
    {
        global $rep, $vues;
        $bdFlux=ModeleAdmin::listerFlux();
        require($rep.$vues['vueFlux']);
    }

    function Reinit($info=NULL){
        global $rep, $vues;
        require($rep.$vues['vueConnectionAdmin']);
    }
}