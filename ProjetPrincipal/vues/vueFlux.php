<?php
global $front;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Flux</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
</head>

<body>
    <div class="container text-center">
        <h1 class="big-title">Liste des flux</h1>
        <table class="flux-table full-width text-center">
            <tr>
                <th name="guid">ID</th>
                <th name="lien">Lien</th>
                <th name="action">Action</th>
            </tr>
        <?php
        /**
         * Created by PhpStorm.
         * User: hufournier
         * Date: 22/11/17
         * Time: 14:46
         */
        global $rep;
        if (!isset($bdFlux) || empty($bdFlux)) {
            echo "<p class='error'>Aucun flux à afficher</p>";
        }
        else{
        ?>

            <?php
            foreach ($bdFlux as $flux) {
                echo "<tr><td>" . $flux->getId() . "</td>";
                echo "<td><a href=https://" . $flux->getLien() . ">" . $flux->getLien() . "</a></td>";
                echo "<td>
                        <form method='POST' action='index.php?action=supprimerFlux'>
                            <input hidden='true' name=\"idFlux\" value=" . $flux->getId() . ">
                            <input class='border-intermediate' name=\"addOrRemove\" type=\"SUBMIT\" attr=\"rem\" value='Supprimer'>
                        </form>
                  </td>
                  </tr>";
            }
            }
            ?>

            <!-- Ligne du tableau où on ajoute un flux -->
            <tr>
                <form method="POST" action='index.php?action=ajouterFlux'>
                    <td>
                        <input class="border-intermediate" type="INPUT" name="idFlux" required>
                    </td>
                    <td>
                        <input class="border-intermediate" type="INPUT" name="lienFlux" required>
                    </td>
                    <td>
                        <input class="border-intermediate" name="addOrRemove" type="SUBMIT" attr="add" value="Ajouter">
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
        <form>
            <input class="border-intermediate" type="button" onclick="window.location.href='?action=connectionAdmin'"
                   value="Déconnexion">
        </form>
    </div>
</body>

</html>
