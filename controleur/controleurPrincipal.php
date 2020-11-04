<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["accueil"] = "c_accueil.php";
    $lesActions["qcm"] = "c_QCM.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["accueil"];
    }
}

?>
