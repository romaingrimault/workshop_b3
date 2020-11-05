<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "vue/entete.html.php";

include_once "$racine/modele/bd.usercontrol.inc.php";

if($_POST) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $age = htmlspecialchars($_POST['age']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['email']);
    $ville = htmlspecialchars($_POST['ville']);
    $adresse = htmlspecialchars($_POST['adresse']);
    update($prenom,$age,$nom,$mail,$ville,$adresse);
}
$lesVilles = getAllVille();
include "$racine/vue/compte.html.php";
include "vue/pied.html.php";
?>