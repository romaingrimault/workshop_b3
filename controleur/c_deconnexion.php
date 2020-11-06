<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


include_once "$racine/modele/bd.usercontrol.inc.php";
session_destroy();


include_once "vue/entete.html.php";
include "$racine/vue/accueil.html.php";
include "vue/pied.html.php";
?>