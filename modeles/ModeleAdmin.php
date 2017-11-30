<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 30/11/17
 * Time: 15:02
 */
class ModeleAdmin
{
    public static function connexion($id, $motDePasse){
        global $base, $login, $mdp;
        $bdAdmin=new AdminGateway(new Connection($base,$login,$mdp));
        return $bdAdmin->verifConnection($id,$motDePasse);
    }
}