<?php
global $front;

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Flux</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
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
                        <form METHOD=POST action='index.php?action=supprimerFlux'>
                            <input hidden='true' NAME=\"idFlux\" VALUE = " . $flux->getId() . ">
                            <button NAME=\"addOrRemove\" TYPE=SUBMIT ATTR=\"rem\">Supprimer</button>
                        </form>
                  </td>
                  </tr>";
        }
        }
        ?>
        <tr>
            <form METHOD=POST action='index.php?action=ajouterFlux'>
                <td>
                    <input TYPE=TEXT NAME="idFlux" required>
                </td>
                <td>
                    <input TYPE=TEXT NAME="lienFlux" required>
                </td>
                <td>
                    <button NAME="addOrRemove" TYPE=SUBMIT ATTR="add">Ajouter</button>
                </td>
            </form>
        </tr>

        <tr>
            <th>ID</th>
            <th>Lien</th>
            <th>Action</th>
        </tr>
    </table>
    <?php if (isset($info)) echo "<h5>" . $info . "</h5>"; ?>
    <br><br>
    <form>
        <input type="button" class="button" onclick="window.location.href='?action=connectionAdmin'" value="Déconnexion">
    </form>
    <!--<a href="?action=connectionAdmin">Déconnexion</a></button>-->
</div>
</body>

</html>
