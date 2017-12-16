<!--/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 29/11/17
 * Time: 17:18
 */-->
<?php
global $front;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?php echo $front['style']?>">
</head>

<div class="container-flex">
    <form class="connection-form" method="POST" action="index.php?action=soumettreConnexion">
        <h1 class="text-center">Connexion</h1>
        <?php if(isset($info)) echo "<h2>".$info."</h2>";?>
        <p>Identifiant</p>
        <input class="border-dark" type="INPUT" name="id">
        <p>Mot de passe</p>
        <input class="border-dark" type="PASSWORD" name="mdp">
        <input class="border-dark" type="SUBMIT" name="login" value="Connexion">
        <input class="border-dark" type="BUTTON" onclick="window.location.href='?action=listerNews&page=0'" value="Retour">
    </form>
</div>

</html>
