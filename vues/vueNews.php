<?php
global $rep, $front;

?>

<html>

<head>
    <meta charset="utf-8">
    <title>News</title>
    <link rel="stylesheet" href="<?php echo $rep . $front['style']?>">
    <link rel="stylesheet" href="<?php echo $rep . $front['bootstrap']?>">
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
if (!isset($bdNews) || empty($bdNews)) {
    echo "Aucune news à afficher<br>";
}
else{
    ?>
    <h1>Liste des News</h1>
    <table class="table-bordered">
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Description</th>
        </tr>
    <?php
    foreach ($bdNews as $news) {
        echo "<tr><td>" . $news->getDateNews()."</td>";
        echo "<td><a href=https://".$news->getLien().">" . $news->getTitre()."</a></td>";
        echo "<td>" . $news->getDescription()."</td></tr>";
    }
}
?>
    </table>
    <?php
echo "<br><a href=?action=listerNews&page=1>1</a>|";
echo "<a href=?action=listerNews&page=".($currentPage-1)."><</a>|";
echo "[".$currentPage."]|";
echo "<a href=?action=listerNews&page=".($currentPage+1).">></a>|";
echo "<a href=?action=listerNews&page=".$nbPage.">".$nbPage."</a>";
?>
    <br><br>
    <a href="?action=connectionAdmin">Connection</a>
</center>
</body>

</html>
