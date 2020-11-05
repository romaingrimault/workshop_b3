<?php
if(isset($_GET['erreur'])){

  echo'  <span>Erreur de login ou de mot de passe</span>';

}
?>

<div class="containerConnexion">
    <div class="InContainer">
        <h2>Connexion</h2>
        <br /><br />
        <form method="POST" action="index.php?action=connexion">
            <input type="email" name="mailconnect" required placeholder="Mail" /><br><br>
            <input type="password" name="mdpconnect" required placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" /><br><br>

        </form>
        <BUTton class="inscription"><a href="index.php?action=inscription">Inscription</a></BUTton>
    </div>
</div>