<html>
<body>
    <?php

    include('Parseur.php');

    $parser = new Parseur(dirname(__FILE__) . '/rss.xml');
    $parser->parse();
    $result = $parser->getResult();
    echo $result;

    ?>
</body>
</html>
