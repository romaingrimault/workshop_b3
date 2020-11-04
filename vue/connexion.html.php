<?php
if($_GET['erreur']){
    ?>
    <span>Erreur de login ou de mot de passe</span>
    <?php
}
?>

<div align="center">
    <h2>Connexion</h2>
    <br /><br />
    <form method="POST" action="index.php?action=connexion">
        <input type="email" name="mailconnect" required placeholder="Mail" />
        <input type="password" name="mdpconnect" required placeholder="Mot de passe" />
        <br /><br />
        <input type="submit" name="formconnexion" value="Se connecter !" />
        <br><br>
    </form>
    <BUTton><a href="index.php?action=inscription">Inscription</a></BUTton>

</div>