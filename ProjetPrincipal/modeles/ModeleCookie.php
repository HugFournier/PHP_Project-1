<?php

/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 20/12/17
 * Time: 09:45
 */
class ModeleCookie
{

    public function getTaillePage()
    {
        global $taillePage;
        if (!Validation::val_taille_page($_COOKIE['taillePage'])) {
            setcookie("taillePage", $taillePage, time() + 365 * 24 * 3600);
        }
        return $_COOKIE["taillePage"];
    }

    public function setTaillePage($nouvTaille)
    {
        global $taillePage;
        if (!Validation::val_taille_page(($nouvTaille))) {
            setcookie("taillePage", $taillePage, time() + 365 * 24 * 3600);
        } else {
            setcookie("taillePage", $nouvTaille, time() + 365 * 24 * 3600);
        }
    }

}
