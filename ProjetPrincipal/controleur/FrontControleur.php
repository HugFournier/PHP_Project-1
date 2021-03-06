<?php

class FrontControleur
{
    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales


        //on initialise un tableau d'erreur
        $dVueEreur = array();

        try {
            if (self::val_actionAdmin($_REQUEST['action'])) {
                //ctrlAdmin
                if (!ModeleAdmin::isAdmin()) {
                    $_REQUEST['action'] = "connectionAdmin";
                    new Controleur();
                }
                new ControleurAdmin();
            } else if (self::val_actionUser($_REQUEST['action'])) {
                //ctrlUser
                new Controleur();
            } else {
                //erreur
                $dVueEreur[] = "Erreur d'appel php";
                require($rep . $vues['erreur']);
            }

            /*} catch (PDOException $e) {
                //si erreur BD, pas le cas ici
                $dVueEreur[] = "Erreur inattendue!!! ";
                require($rep . $vues['erreur']);
            */
        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
//fin
        exit(0);
    }//fin constructeur


    static function val_actionAdmin($action): bool
    {
        global $actionAdmin;
        return in_array($action, $actionAdmin);
    }

    static function val_actionUser($action): bool
    {
        global $actionUser;
        return in_array($action, $actionUser);
    }

}
