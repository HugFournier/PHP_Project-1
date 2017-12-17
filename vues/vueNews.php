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
    <table attr-top="SPACED" attr-bottom="SPACED" class="full-width">
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

    <input class='border-intermediate inline' type='BUTTON' onclick="window.location.href='?action=listerNews&page=1'" value='1'>
    <input class='border-intermediate inline' type='BUTTON' onclick="window.location.href='?action=listerNews&page=<?php echo ($currentPage - 1) ?>'" value='Précédent'>
    <input class='border-intermediate inline' type='BUTTON' value='<?php echo $currentPage ?>'>
    <input class='border-intermediate inline' type='BUTTON' onclick="window.location.href='?action=listerNews&page=<?php echo ($currentPage + 1) ?>'" value='Suivant'>
    <input class='border-intermediate inline' type='BUTTON' onclick="window.location.href='?action=listerNews&page=<?php echo $nbPage ?>'" value='<?php echo $nbPage ?>'>

    <form attr-top="SPACED" attr-bottom="SPACED" method="POST" action='index.php?action=changerTaillePage&page=0'>
        <p>Choisir le nombre de news par page</p>
        <input class="border-intermediate inline" type="NUMBER" name="taillePage" min="1" max="20">
        <input class="border-intermediate inline" type="SUBMIT" value="Appliquer">
        <input class="border-intermediate" type="BUTTON" onclick="window.location.href='?action=connectionAdmin'"
               value="Connexion">
    </form>
</div>
</body>

</html>
