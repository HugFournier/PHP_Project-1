<html>

<head>
    <title>News</title>
</head>

<body>
<center>
    <?php
    /**
     * Created by PhpStorm.
     * User: hufournier
     * Date: 22/11/17
     * Time: 14:46
     */
    global $rep;
    if (!isset($bdFlux) || empty($bdFlux)) {
        echo "Aucun flux à afficher<br>";
    }
    else{
    ?>
    <h1>Liste des Flux</h1>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Lien</th>
            <th>Supprimer</th>
        </tr>
        <?php
        foreach ($bdFlux as $flux) {
            echo "<tr><td>" . $flux->getId()."</td>";
            echo "<td><a href=https://".$flux->getLien().">" . $flux->getLien()."</a></td>";
            echo "<td><a href=></a></td></tr>";
        }
        }
        ?>
    </table>
    <?php/*
    echo "<br><a href=?action=listerNews&page=1>1</a>|";
    echo "<a href=?action=listerNews&page=".($currentPage-1)."><</a>|";
    echo "[".$currentPage."]|";
    echo "<a href=?action=listerNews&page=".($currentPage+1).">></a>|";
    echo "<a href=?action=listerNews&page=".$nbPage.">".$nbPage."</a>";
    */?>
    <br><br>
    <a href="?action=connectionAdmin">Connection</a>
</center>
</body>

</html>