<?php
global $front;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>News</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
</head>

<body>
    <div class="container text-center">
        <h1 class="big-title">Liste des news</h1>
        <?php
        global $rep;
        if (!isset($bdNews) || empty($bdNews)) {
            echo "<p class='error'>Aucune news à afficher</p>";
        }
        else{
        ?>

        <table attr-top="SPACED" attr-bottom="SPACED" class="full-width" name="news-table">
            <tr>
                <th name="date">Date</th>
                <th name="description">News</th>
            </tr>
            <?php
            foreach ($bdNews as $news) {
                echo "<tr><td class='text-center'>" . $news->getDateNews() . "</td>";
                echo "<td name='minidesc'><a class='display-block text-bold' target='_blank' href=" . $news->getLien() .
                    ">" .
                    $news->getTitre
                    () . "
</a><span class='text-italic'>" .
                    $news->getDescription() . "</span></td></tr>";
            }
            }
            ?>
        </table>

        <!-- Les boutons que tu voulais tant -->
        <input class='border-intermediate inline' type='BUTTON'
               onclick="window.location.href='?action=listerNews&page=1'"
               value='Début [1]'>
        <input class='border-intermediate inline' type='BUTTON'
               onclick="window.location.href='?action=listerNews&page=<?php echo($currentPage - 1) ?>'"
               value='<< Précédent'>
        <input class='border-intermediate inline' type='BUTTON' value='Page actuelle [<?php echo $currentPage ?>]'>
        <input class='border-intermediate inline' type='BUTTON'
               onclick="window.location.href='?action=listerNews&page=<?php echo($currentPage + 1) ?>'"
               value='Suivant >>'>
        <input class='border-intermediate inline' type='BUTTON'
               onclick="window.location.href='?action=listerNews&page=<?php echo $nbPage ?>'"
               value='Fin [<?php echo $nbPage ?>]'>

        <!-- Changement de taille et bouton de connexion -->
        <form attr-top="SPACED" attr-bottom="SPACED" method="POST" action='index.php?action=changerTaillePage&page=0'>
            <p>Nombre de news par page (1-20)</p>
            <input class="border-intermediate inline" type="NUMBER" name="taillePage" min="1" max="20">
            <input class="border-intermediate inline" type="SUBMIT" value="Appliquer">
            <input class="border-intermediate" type="BUTTON" onclick="window.location.href='?action=connectionAdmin'"
                   value="Connexion">
        </form>
    </div>
</body>

</html>
