<!--/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 29/11/17
 * Time: 17:18
 */-->
<?php
global $front;

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?php echo $front['style']?>">
</head>

<center>
    <h1>Connexion</h1>
    <?php if(isset($info)) echo "<h2>".$info."</h2>";?>
    <form METHOD=POST action ="index.php?action=soumettreConnexion">
        <p class="no-margin">Identifiant</p>
        <input TYPE=TEXT NAME="id" required>
        <p class="no-margin">Mot de passe</p>
        <input TYPE=password NAME="mdp" required><br><br>
        <button TYPE=SUBMIT>Connexion</button>
    </form>
    <form>
        <input type="button" class="button" onclick="window.location.href='?action=listerNews&page=0'" value="Retour">
    </form>
    <!--<button><a href="?action=listerNews&page=0">Retour</a></button>-->
</center>

</html>
