<?php
global $front;

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Flux</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
    <link rel="stylesheet" href="<?php echo $front['bootstrap'] ?>">
</head>

<body>
<div class="container">
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
    <table class="table-bordered full-width text-center">
        <tr>
            <th name="guid">ID</th>
            <th name="lien">Lien</th>
            <th name="action">Action</th>
        </tr>
        <?php
        foreach ($bdFlux as $flux) {
            echo "<tr><td>" . $flux->getId() . "</td>";
            echo "<td><a href=https://" . $flux->getLien() . ">" . $flux->getLien() . "</a></td>";
            echo "<td>
                        <FORM METHOD=POST action='index.php?action=supprimerFlux'>
                            <INPUT hidden='true' NAME=\"idFlux\" VALUE = " . $flux->getId() . ">
                            <INPUT NAME=\"addOrRemove\" TYPE=SUBMIT VALUE = \"Supprimer\">
                        </FORM>
                  </td>
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
                    <INPUT NAME="addOrRemove" TYPE=SUBMIT VALUE="Ajouter">
                </td>
            </FORM>
        </tr>

        <tr>
            <th>ID</th>
            <th>Lien</th>
            <th>Action</th>
        </tr>
    </table>
    <?php if (isset($info)) echo "<h5>" . $info . "</h5>"; ?>
    <br><br>
    <a href="?action=connectionAdmin">Déconnection</a>
</div>
</body>

</html>
