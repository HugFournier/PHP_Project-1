<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 30/11/17
 * Time: 14:04
 */
class FluxFactory
{
    public static function creerFlux($listeAttributFlux)
    {
        $listeRetour=[];
        foreach($listeAttributFlux as $r)
            $listeRetour[]=new Flux($r['ID'],$r['lien']);
        return $listeRetour;
    }
}