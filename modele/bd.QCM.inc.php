<?php

include_once "bd.inc.php";
function getNombresQuestionsQCM(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(question.id) as c FROM question ");
        
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = (int)$resultat['c'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getListeIdQuestions(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT question.id FROM question ");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
       
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

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

function reponseUtilisateur($idQ, $idR, $idUtilisateur) {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO choixreponse(reponse, question, utilisateur) VALUES ('$idR', '$idQ', '$idUtilisateur')");
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function totalPtsQCM($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(reponsepossible.point) as pt FROM reponsepossible INNER JOIN question ON question.id = reponsepossible.question INNER JOIN choixreponse ON choixreponse.question = question.id WHERE choixreponse.utilisateur ='$id' AND (reponsepossible.reponse, reponsepossible.question) = (choixreponse.reponse, choixreponse.question)");
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getListeUtilisateurQCM(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT DISTINCT(choixreponse.utilisateur) FROM choixreponse");
        
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>

