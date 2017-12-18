<?php

class FluxFactory {
    public static function creerFlux($listeAttributFlux) {
        $listeRetour = [];
        foreach ($listeAttributFlux as $r)
            $listeRetour[] = new Flux($r['ID'], $r['lien']);
        return $listeRetour;
    }
}
