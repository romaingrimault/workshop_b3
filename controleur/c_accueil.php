<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "vue/entete.html.php";


// appel des vues accueil
$titre = "Accueil";

include "$racine/vue/accueil.html.php";
include "vue/pied.html.php";
?>