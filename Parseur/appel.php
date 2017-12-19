<html>
<body>
    <?php
    $elementsCible=["title","link","description","pubdate","guid"];
    $i=array_map(function(){return array(false,null);},$elementsCible);
    var_dump($i);
/*
    include('Parseur.php');
    $parser = new Parseur(dirname(__FILE__) . '/rss.xml');
    echo "Parseur créé<br>";
    $parser->parse();
    echo $parser->getResult();
*/
    ?>
</body>
</html>
