<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
require "vue/entete.html.php";

include_once "$racine/modele/bd.usercontrol.inc.php";

if(empty($_POST)) {
    $lesVilles=getAllVille();
    include "$racine/vue/inscription.html.php";
}
else{
    $prenom = htmlspecialchars($_POST['prenom']);
    $age = htmlspecialchars($_POST['age']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = md5($_POST['mdp']);
    $mdp2 = md5($_POST['mdp2']);
    $ville = htmlspecialchars($_POST['ville']);
    $adresse = htmlspecialchars($_POST['adresse']);
   if($mdp==$mdp2 && $mail2==$mail) {
        $sameMail=chekAdresse($mail);
        if(!$sameMail) inscription($prenom,$age,$nom,$mail,$mdp,$ville,$adresse);
    }else
    {
        include "$racine/vue/inscription.html.php?erreur=1";
    }
}include "vue/pied.html.php";