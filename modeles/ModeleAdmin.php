<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 30/11/17
 * Time: 15:02
 */
class ModeleAdmin
{
    public static function connexion($id, $motDePasse, &$info){
        global $base, $login, $mdp;
        if(!Validation::val_string($id) || !Validation::val_string($motDePasse)){
            $info="Attention tentative de piratage ! (sécurisé)";
            return false;
        }
        $bdAdmin=new AdminGateway(new Connection($base,$login,$mdp));
        if($bdAdmin->verifConnection($id,$motDePasse)){
            $_SESSION['role']='admin';
            $_SESSION['login']='id';
            return true;
        }
        else {
            $info="Identifiant et/ou mot de passe incorrects";
            return false;
        }
    }

    public static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public static function listerFlux(){
        global $base, $login, $mdp;
        $bdFlux=new FluxGateway(new Connection($base,$login,$mdp));
        return $bdFlux->findAll();
    }

    public static function supprimerFlux($idFlux){
        global $base, $login, $mdp;
        if(Validation::val_string($idFlux)) {
            $bdFlux = new FluxGateway(new Connection($base, $login, $mdp));
            $bdFlux->delete($idFlux);
        }
        else throw new Exception("ID flux incorrect");
    }

    public static function ajouterFlux($idFlux,$lienFlux){
        global $base, $login, $mdp;
        if(!Validation::val_string($idFlux) || !Validation::val_string($lienFlux)){
            $info="Attention tentative de piratage ! (sécurisé)";
            return;
        }
        $bdFlux=new FluxGateway(new Connection($base,$login,$mdp));
        try{
            $bdFlux->insertBrut($idFlux,$lienFlux);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public static function isAdmin(){
        return isset($_SESSION['login']) && isset($_SESSION['role']) && Validation::val_string($_SESSION['login']) && Validation::val_string($_SESSION['role']);
    }
}