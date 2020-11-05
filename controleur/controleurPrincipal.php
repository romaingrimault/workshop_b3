
<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["accueil"] = "c_accueil.php";
    $lesActions["qcm"] = "c_QCM.php";
    $lesActions["connexion"] = "c_connexion.php";
    $lesActions["inscription"] = "c_inscription.php";
    $lesActions["compte"] = "c_compte.php";
    $lesActions["deconnexion"] = "c_deconnexion.php";
    $lesActions["confirmqcm"] = "c_QCM.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["accueil"];
    }
}


function beginSession(){

    session_start();
}

?>

