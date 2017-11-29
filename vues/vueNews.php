<html>

<head>
    <title>News</title>
</head>

<body>
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
    echo "<h1>Liste des News</h1>";
    foreach ($bdNews as $news) {
        echo $news->__toString() . "<br>";
    }
}
echo "<br><a href=?action=listerNews?page=1>1</a>";
echo "<br><a href=?action=listerNews?page=".$currentPage.">précedent</a>";
echo "<br><a href=?action=listerNews?page=".$currentPage.">suivant</a>";
echo "<br><a href=?action=listerNews?page=".$nbPage.">".$nbPage."</a>";

?>
</body>

</html>
