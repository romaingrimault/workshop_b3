<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
require "vue/entete.html.php";

include_once "$racine/modele/bd.forum.inc.php";
// appel des vues accueil
$titre = "forum";

if(!empty($_POST)){
    switch ($_POST['action']){
        case 'mine':
            $propositions=getUserProposision();
            break;
        case 'top':
            $propositions=getTopProposision();
            break;
        case 'last':
            $propositions=getLastProposision();

            break;
        case 'new':
           if(isset($_POST['propoTitre']) && isset($_POST['propoBody'])) {
               addProposition($_POST['propoTitre'],$_POST['propoBody']);
           }

            $propositions=getLastProposision();
            $propositionNew="new";

            break;
    }
}
else{
    $propositions=getAllProposision();
}

include "$racine/vue/forum.html.php";
include "vue/pied.html.php";
?>