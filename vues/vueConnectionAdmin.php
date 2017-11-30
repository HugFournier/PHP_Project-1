<!--/**
 * Created by PhpStorm.
 * User: hufournier
 * Date: 29/11/17
 * Time: 17:18
 */-->

<center>
    <?php if(isset($info)) echo "<h1>".$info."</h1>";?>
    <FORM METHOD=POST>
        <P>Identifiant Admin</P>
        <INPUT TYPE=TEXT NAME="id" required>
        <P>Mot de passe</P>
        <INPUT TYPE=TEXT NAME="mdp" required><br><br>
        <INPUT TYPE=SUBMIT NAME="action" VALUE = "soumettreConnexion">
    </FORM>
    <a href="?action=listerNews&page=0">Retour</a>
</center>