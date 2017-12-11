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
    <link rel="stylesheet" href="<?php echo $front['bootstrap']?>">
</head>

<center>
    <h1>Connexion</h1>
    <?php if(isset($info)) echo "<h2>".$info."</h2>";?>
    <FORM METHOD=POST action ="index.php?action=soumettreConnexion">
        <P class="no-margin">Identifiant</P>
        <INPUT TYPE=TEXT NAME="id" required>
        <P class="no-margin">Mot de passe</P>
        <INPUT TYPE=password NAME="mdp" required><br><br>
        <INPUT TYPE=SUBMIT value="Connection">
    </FORM>
    <a href="?action=listerNews&page=0">Retour</a>
</center>

</html>
