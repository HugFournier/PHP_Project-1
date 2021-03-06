<?php
global $front;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="shortcut icon" href="vues/img/favicon.png">
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
</head>

<body>
    <div class="container-flex">
        <form class="connection-form" method="POST" action="index.php?action=soumettreConnexion">
            <h1 class="text-center big-title">Connexion</h1>
            <?php if (isset($info)) echo "<p attr-top='SPACED' attr-bottom='SPACED' class='error text-center'>" . $info .
                "</p>"; ?>
            <p>Identifiant</p>
            <input class="border-intermediate" type="INPUT" name="id">
            <p>Mot de passe</p>
            <input class="border-intermediate" type="PASSWORD" name="mdp" attr-bottom="SPACED">
            <input class="border-intermediate" type="SUBMIT" name="login" value="Connexion">
            <input class="border-intermediate" type="BUTTON" onclick="window.location.href='?action=listerNews&page=0'"
                   value="Retour">
        </form>
    </div>
</body>

</html>
