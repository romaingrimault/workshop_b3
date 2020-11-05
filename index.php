<?php
include "getRacine.php";

include "$racine/controleur/controleurPrincipal.php";
//include_once "$racine/modele/authentification.inc.php"; // pour pouvoir utiliser isLoggedOn()
beginSession();

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "accueil";
}

$fichier = controleurPrincipal($action);

include "$racine/controleur/$fichier";
include "vue/pied.html.php";
?>
     