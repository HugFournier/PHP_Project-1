<?php

class Modele
{
    public function listerNews($nb)
    {
        global $base, $login, $mdp;
        $bdNews = new NewsGateway(new Connection($base, $login, $mdp));
        return $bdNews->findN($nb);
    }

    public function nbPage()
    {
        global $base, $login, $mdp;
        $bdNews = new NewsGateway(new Connection($base, $login, $mdp));
        return $bdNews->nbPage();
    }
}
