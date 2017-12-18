<?php

class Modele {
    static public function listerNews($nb) {
        global $base, $login, $mdp;
        $bdNews = new NewsGateway(new Connection($base, $login, $mdp));
        return $bdNews->findN($nb);
    }

    static public function nbPage() {
        global $base, $login, $mdp;
        $bdNews = new NewsGateway(new Connection($base, $login, $mdp));
        return $bdNews->nbPage();
    }

    static public function getTaillePage() {
        global $taillePage;
        if (!Validation::val_taille_page(($_COOKIE['taillePage']))) {
            setcookie("taillePage", $taillePage, time() + 365 * 24 * 3600);
        }
        return $_COOKIE['taillePage'];
    }

    static public function setTaillePage($nouvTaille) {
        global $taillePage;
        if (!Validation::val_taille_page(($nouvTaille))) {
            setcookie("taillePage", $taillePage, time() + 365 * 24 * 3600);
        } else {
            setcookie("taillePage", $nouvTaille, time() + 365 * 24 * 3600);
        }
    }
}
