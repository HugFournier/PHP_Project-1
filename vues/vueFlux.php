<html>

<head>
    <meta charset="utf-8">
    <title>Flux</title>
    <link rel="stylesheet" href="http://damiennguyen.com/PHP_Project/css/style.css">
    <link rel="stylesheet" href="http://damiennguyen.com/PHP_Project/css/bootstrap.css">
</head>

<body>
<center>
    <h1>Liste des Flux</h1>
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
    <table class="table-bordered">
        <tr>
            <th>ID</th>
            <th>Lien</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($bdFlux as $flux) {
            echo "<tr><td>" . $flux->getId()."</td>";
            echo "<td><a href=https://".$flux->getLien().">" . $flux->getLien()."</a></td>";
            echo   "<td><center>
                        <FORM METHOD=POST action='index.php?action=supprimerFlux'>
                            <INPUT hidden='true' NAME=\"idFlux\" VALUE = ".$flux->getId().">
                            <INPUT TYPE=SUBMIT VALUE = \"Supprimer\">
                        </FORM>
                    </center></td>
                  </tr>";
        }
        }
        ?>
        <tr>
            <FORM METHOD=POST action='index.php?action=ajouterFlux'>
            <td>
                <INPUT TYPE=TEXT NAME="idFlux" required>
            </td>
            <td>
                <INPUT TYPE=TEXT NAME="lienFlux" required>
            </td>
            <td>
                <INPUT TYPE=SUBMIT VALUE = "Ajouter">
            </td>
            </FORM>
        </tr>

        <tr>
            <th>ID</th>
            <th>Lien</th>
            <th>Action</th>
        </tr>
    </table>
    <br><br>
    <a href="?action=connectionAdmin">Déconnection</a>
</center>
</body>

</html>
