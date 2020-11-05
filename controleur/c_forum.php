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
            echo 'top';
            break;
        case 'last':
            $propositions=getLastProposision();
            echo 'last';
            break;
    }
}
else{
    $propositions=getAllProposision();
}

include "$racine/vue/forum.html.php";

?>