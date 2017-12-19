<html>
<body>
<?php

include('Parseur.php');
include('Connection.php');
// BD
$base = "mysql:host=localhost;dbname=dbhufournier";
$login = "hufournier";
$mdp = "hufournier";

try {
    $con = new Connection($base, $login, $mdp);
}catch (Exception $e){
    echo $e->getMessage();
}

$query = "SELECT lien FROM Flux";
$con->executeQuery($query);
$listeLien=$con->getResults();

foreach($listeLien as $lien) {
    echo $lien['lien']."<br>";
    /*$parser = new Parseur($lien['lien']);
    $parser->parse();

    $listeNews = $parser->getListeNews();
    var_dump($listeNews);*/
}

?>
</body>
</html>
