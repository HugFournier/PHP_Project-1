<?php
global $front;

?>

<html>

<head>
    <meta charset="utf-8">
    <title>News</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
    <link rel="stylesheet" href="<?php echo $front['bootstrap'] ?>">
</head>

<body>
<div class="container">
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
    <table class="table-bordered full-width">
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
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>
    <br><br>
    <a href="?action=connectionAdmin">Connection</a>
</div>
</body>

</html>
