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
                case "listerFlux":
                    //echo "ok";
                    $this->Reinit();
                    break;
                case "deconnectionAdmin":
                    require($rep . $vues['vueConnectionAdmin']);
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

    function Reinit()
    {
        global $rep, $vues;
        $bdFlux=ModeleAdmin::listerFlux();
        require($rep.$vues['vueFlux']);
    }
}