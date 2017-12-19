<?php
global $front;

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Erreur</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
</head>

<body>

    <div class="container">
        <h1 class="big-title">ERREUR !</h1>
        <?php
        if (isset($dVueEreur)) {
            foreach ($dVueEreur as $value) {
                echo $value;
            }
        }
        ?>
    </div>

</body>
</html>
