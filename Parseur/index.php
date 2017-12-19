<html>
<body>
    <?php

    include('Parseur.php');
    include('Connection.php');
    // BD
    $base  = "mysql:host=localhost;dbname=dbhufournier";
    $login = "hufournier";
    $mdp   = "hufournier";

    try {
        $con = new Connection($base, $login, $mdp);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $query = "SELECT lien FROM Flux";
    $con->executeQuery($query);
    $listeLien = $con->getResults();

    foreach ($listeLien as $lien) {
        echo $lien['lien'] . "<br>";
        $parser = new Parseur($lien['lien']);
        $parser->parse();

        $listeNews = $parser->getListeNews();
        foreach ($listeNews as $news) {
            $news["pubdate"] = date("Y-m-d H:i:s", strtotime($dateNews));
            try {
                $query    = "INSERT INTO NEWS VALUES(:id, :dateNews, :description, :titre, :lien, :origine)";
                $argument = array(
                    ':id' => array($news["guid"], PDO::PARAM_STR),
                    ':dateNews' => array(NULL, PDO::PARAM_STR),
                    ':description' => array($news["description"], PDO::PARAM_STR),
                    ':titre' => array($news["title"], PDO::PARAM_STR),
                    ':lien' => array($news["link"], PDO::PARAM_STR),
                    ':origine' => array($news["origine"], PDO::PARAM_STR)
                );
                $con->executeQuery($query, $argument);
                echo "News ajoutée";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    ?>
</body>
</html>
