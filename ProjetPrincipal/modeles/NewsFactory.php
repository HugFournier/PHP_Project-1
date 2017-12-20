<?php

class NewsFactory
{
    public function creerNews($listeAttributNews): array
    {
        $listeRetour = [];
        foreach ($listeAttributNews as $r)
            $listeRetour[] = new News($r['titre'], $r['lien'], $r['description'], $r['date'], $r['guid']);
        return $listeRetour;
    }
}
