<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
require "vue/entete.html.php";

include_once "$racine/modele/bd.usercontrol.inc.php";
session_destroy();
include "$racine/vue/accueil.html.php";

?>