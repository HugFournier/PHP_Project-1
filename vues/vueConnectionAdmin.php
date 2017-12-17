<?php
global $front;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?php echo $front['style'] ?>">
</head>

<div class="container-flex">
    <form class="connection-form" method="POST" action="index.php?action=soumettreConnexion">
        <h1 class="text-center">Connexion</h1>
        <?php if (isset($info)) echo "<h4 attr-top='SPACED' attr-bottom='SPACED' class='error'>" . $info . "</h4>"; ?>
        <p>Identifiant</p>
        <input class="border-intermediate" type="INPUT" name="id">
        <p>Mot de passe</p>
        <input class="border-intermediate" type="PASSWORD" name="mdp" attr-bottom="SPACED">
        <input class="border-intermediate" type="SUBMIT" name="login" value="Connexion">
        <input class="border-intermediate" type="BUTTON" onclick="window.location.href='?action=listerNews&page=0'"
               value="Retour">
    </form>
</div>

</html>
