<?php

include_once "bd.inc.php";
function getQuestionsQCM(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT question.id, question.nom FROM question ");
        
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getReponsesQCM(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT question.id AS idQ, reponse.id AS idR, reponse.nom FROM question 
            INNER JOIN reponsepossible ON reponsepossible.question = question.id
            INNER JOIN reponse ON reponsepossible.reponse = reponse.id");
        
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>

