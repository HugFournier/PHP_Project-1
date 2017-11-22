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

if (isset($dVueNews)) {
    foreach ($dVueNews as $news) {
        echo $news->__toString() . "<br>";
    }
}

?>

</body>

</html>
