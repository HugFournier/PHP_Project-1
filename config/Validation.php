<?php

class Validation
{

    static function val_actionAdmin($action)
    {
        global $actionAdmin;
        return in_array($action,$actionAdmin);
    }

    static function val_actionUser($action)
    {
        global $actionUser;
        return in_array($action,$actionUser);
    }

    static function val_string(string $mot)
    {
        return isset($mot) && $mot != "" && $mot==filter_var($mot, FILTER_SANITIZE_STRING);
    }

    static function val_page($current, $nbPage){
        if(Validation::val_int($current)){
            if($current<1)return 1;
            if($current>$nbPage)return $nbPage;
            return $current;
        }
        else {
            return 1;
        }
    }

    static function val_int($entier){
        return isset($entier) && $entier!= "" && filter_var($entier, FILTER_VALIDATE_INT);
    }
}

?>

        