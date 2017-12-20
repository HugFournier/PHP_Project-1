<?php

class Modele
{
    public function listerNews($nb): array
    {
        global $base, $login, $mdp;
        $bdNews = new NewsGateway(new Connection($base, $login, $mdp));
        return $bdNews->findN($nb);
    }

    public function nbPage(): int
    {
        global $base, $login, $mdp;
        $bdNews = new NewsGateway(new Connection($base, $login, $mdp));
        return $bdNews->nbPage();
    }
}
