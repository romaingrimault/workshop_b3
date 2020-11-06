<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "vue/entete.html.php";

include_once "$racine/modele/bd.usercontrol.inc.php";

if(empty($_POST)) {
    include "$racine/vue/connexion.html.php";
}
else{
    $login = connexion($_POST['mailconnect'],md5($_POST['mdpconnect']));
    if($login){
        include "$racine/vue/accueil.html.php";
    }
    else{
        ?>
        <center>
	    <div>Erreur de login ou de mot de passe. </div> <br/>
	    <BUTton class="inscription"><a href="index.php?action=connexion">Se connecter / Créer un compte</a></BUTton>
	</center>
    <?php
    }
}
include "vue/pied.html.php";
?>