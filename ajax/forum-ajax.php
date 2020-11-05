<?php
include "../getRacine.php";
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.forum.inc.php";
if($_POST['state']==1) setVote($_POST['idPropo']);
elseif($_POST['state']==0) unSetVote($_POST['idPropo']);