<?php

class Validation
{
    static function val_string(string $mot)
    {
        return
            isset($mot) &&
            $mot != "" &&
            $mot == filter_var($mot, FILTER_SANITIZE_STRING);
    }

    static function val_page($current, $nbPage)
    {
        if (Validation::val_int($current)) {
            if ($current < 1) return 1;
            if ($current > $nbPage) return $nbPage;
            return $current;
        } else {
            return 1;
        }
    }

    static function val_int($entier)
    {
        return
            isset($entier) &&
            $entier != ""&&
            filter_var($entier, FILTER_SANITIZE_NUMBER_INT) &&
            filter_var($entier, FILTER_VALIDATE_INT);
    }

    static function val_url($url)
    {
        return
            isset($url) &&
            $url != "" &&
            filter_var($url, FILTER_SANITIZE_URL);
    }
}
