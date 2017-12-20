<?php
/****************************************************************************************************
 * Created by damsng63
 * Date: 12/20/17
 ****************************************************************************************************/

class SessionParseur
{
    function start()
    {
        include_once('Parseur.php');
        include_once('Connection.php');
        include_once('Controleur.php');
        // BD
        $base  = "mysql:host=localhost;dbname=dbhufournier";
        $login = "hufournier";
        $mdp   = "hufournier";

        echo "<h1>Parse réalisé à : " . date("H:i:s") . "</h1>";

        try {
            $con = new Connection($base, $login, $mdp);
        } catch (Exception $e) {
            echo $e->getMessage();
        }


        $rejet = 0;
        $ajout = 0;

        $query = "SELECT lien FROM Flux";
        $con->executeQuery($query);
        $listeLien = $con->getResults();

        foreach ($listeLien as $lien) {
            echo $lien['lien'] . "<br>";
            $parser = new Parseur($lien['lien']);
            $parser->parse();

            $listeNews = $parser->getListeNews();
            foreach ($listeNews as $news) {
                if (isset($news["pubdate"])) {
                    $news["pubdate"] = date("Y-m-d H:i:s", strtotime($news["pubdate"]));
                } else {
                    $news["pubdate"] = date('Y-m-d H:i:s');
                }

                if (!isset($news["guid"])) {
                    $news["guid"] = $news["link"];
                }

                if (!isset($news["description"])) {
                    $news["description"] = "Aucune description";
                }

                try {
                    $query    = "INSERT INTO NEWS VALUES(:id, :dateNews, :description, :titre, :lien, :origine)";
                    $argument = array(
                        ':id' => array($news["guid"], PDO::PARAM_STR),
                        ':dateNews' => array($news["pubdate"], PDO::PARAM_STR),
                        ':description' => array($news["description"], PDO::PARAM_STR),
                        ':titre' => array($news["title"], PDO::PARAM_STR),
                        ':lien' => array($news["link"], PDO::PARAM_STR),
                        ':origine' => array($news["origine"], PDO::PARAM_STR)
                    );
                    $con->executeQuery($query, $argument);
                    $ajout++;
                } catch (Exception $e) {
                    $rejet++;
                }
            }
            echo $ajout . " : News ajoutée(s)" . "<br>";
            echo $rejet . " : News rejetée(s)" . "<br>";
        }
        echo "<h2><a href=\"?action=stop\">Stop</a></h2>";

        /*$attente = 0;
        while ($attente < 2) {
            if ($_REQUEST["action"] != "start") {
                echo "Fin<br>";
                return;
            }
            $attente++;
            sleep(1);
        }
        $attente = 0;
        echo "fin attente";
        $this->start();*/
        $_REQUEST["action"] = "restart";
        new Controleur();
    }
}
