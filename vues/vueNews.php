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
echo "<br><a href=?action=listerNews>listeNews</a>"

?>
</body>

</html>
