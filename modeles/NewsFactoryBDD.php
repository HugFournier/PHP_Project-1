<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 29/11/17
 * Time: 13:16
 */
class NewsFactoryBDD extends NewsFactory
{
    public function creerNews($listeAttributNews)
    {
        $listeRetour=[];
        foreach($listeAttributNews as $r)
            $listeRetour[]=new News($r['titre'],$r['lien'],$r['description'],$r['date'],$r['guid']);
        return $listeRetour;
    }
}