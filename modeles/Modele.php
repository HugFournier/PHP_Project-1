<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 28/11/17
 * Time: 18:06
 */
class Modele
{
    static public function listerNews($nb){
        global $base, $login, $mdp;
        echo "testModele";
        $bdNews=new NewsGateway(new Connection($base,$login,$mdp));
        echo "test";
        return $bdNews->findN($nb);
    }

    static public function nbPage(){
        global $base, $login, $mdp;
        $bdNews=new NewsGateway(new Connection($base,$login,$mdp));
        return $bdNews->nbPage();
    }
}