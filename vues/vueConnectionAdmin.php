<!--/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 29/11/17
 * Time: 17:18
 */-->
<html>

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<center>
    <?php if(isset($info)) echo "<h1>".$info."</h1>";?>
    <FORM METHOD=POST action ="index.php?action=soumettreConnexion">
        <P>Identifiant Admin</P>
        <INPUT TYPE=TEXT NAME="id" required>
        <P>Mot de passe</P>
        <INPUT TYPE=TEXT NAME="mdp" required><br><br>
        <INPUT TYPE=SUBMIT value="Connection">
    </FORM>
    <a href="?action=listerNews&page=0">Retour</a>
</center>

</html>
