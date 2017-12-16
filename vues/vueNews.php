<?php
global $front;

?>

<html>

<head>
    <meta charset="utf-8">
    <title>News</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
</head>

<body>
<div class="container text-center">
    <?php
    /**
     * Created by PhpStorm.
     * User: hufournier
     * Date: 22/11/17
     * Time: 14:46
     */
    global $rep;
    if (!isset($bdNews) || empty($bdNews)) {
        echo "Aucune news à afficher<br>";
    }
    else{
    ?>
    <h1>Liste des news</h1>
    <table class="full-width">
        <tr>
            <th name="date">Date</th>
            <th name="nom">Nom</th>
            <th name="description">Description</th>
        </tr>
        <?php
        foreach ($bdNews as $news) {
            echo "<tr><td>" . $news->getDateNews() . "</td>";
            echo "<td><a href=https://" . $news->getLien() . ">" . $news->getTitre() . "</a></td>";
            echo "<td>" . $news->getDescription() . "</td></tr>";
        }
        }
        ?>
    </table>
    <?php
    echo "<br><a href=?action=listerNews&page=1>1</a> | ";
    echo "<a href=?action=listerNews&page=" . ($currentPage - 1) . "><</a> | ";
    echo "[" . $currentPage . "] | ";
    echo "<a href=?action=listerNews&page=" . ($currentPage + 1) . ">></a> | ";
    echo "<a href=?action=listerNews&page=" . $nbPage . ">" . $nbPage . "</a>";
    ?>
    <form method="POST" action='index.php?action=changerTaillePage&page=0'>
        <p>Choisir le nombre de news par page</p>
        <p>Je te ferai des boutons pour les pages demain, promis !</p>
        <input class="border-dark inline" type="NUMBER" name="taillePage" min="1" max="20">
        <input class="border-dark inline" type="SUBMIT" value="Appliquer">
        <input class="border-dark" type="BUTTON" onclick="window.location.href='?action=connectionAdmin'" value="Connexion">
    </form>
</div>
</body>

</html>
