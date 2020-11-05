<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
require "vue/entete.html.php";

include_once "$racine/modele/bd.usercontrol.inc.php";

if(empty($_POST)) {
    include "$racine/vue/connexion.html.php";
}
else{
    $login = connexion($_POST['mailconnect'],md5($_POST['mdpconnect']));
    if($login){
        include  "$racine/vue/entete.html.php";
        include "$racine/vue/accueil.html.php";
    }
    else{
        include "$racine/vue/connexion.html.php?erreur=1";
    }
}
include "vue/pied.html.php";
?>