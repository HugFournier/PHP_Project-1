<?php
/****************************************************************************************************
 * Created by damsng63
 * Date: 12/20/17
 ****************************************************************************************************/

class Controleur
{
    function __construct()
    {
        if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "start") {
            //ob_start();
            include_once("SessionParseur.php");
            (new SessionParseur())->start();
        } elseif (isset($_REQUEST["action"]) && $_REQUEST["action"] == "restart") {
            ob_end_flush();
            flush();
            time_nanosleep(15,0);
            include_once("SessionParseur.php");
            (new SessionParseur())->start();
            ob_end_clean();
        } else {
            echo "<a href='?action=start'>Start</a>";
        }
    }
}
