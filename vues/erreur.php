<?php
global $front;

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Erreur</title>
    <link rel="stylesheet" href="<?php echo $front['style']?>">
    <link rel="stylesheet" href="<?php echo $front['bootstrap']?>">
</head>

<body>

<h1>ERREUR !!!!!</h1>
<?php
if (isset($dVueEreur)) {
    foreach ($dVueEreur as $value) {
        echo $value;
    }
}
?>

</body>
</html>
