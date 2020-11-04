<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

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
        include "$racine/vue/connexion.html.php?erreur=1";
    }
}

?>