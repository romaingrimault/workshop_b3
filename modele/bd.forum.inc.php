<?php

include_once "bd.inc.php";

function getLastProposision(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT titre,id,description,dateCreation FROM proposition ");

        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}
function getTopProposision(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT titre,id,description,dateCreation FROM proposition ");

        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}
function getUserProposision()
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT titre,id,description,dateCreation FROM proposition where utilisateur=:id ");
        $req->bindParam(":id", $_SESSION['user']['id']);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

    function getAllProposision(){

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT titre,id,description,dateCreation FROM proposition where utilisateur=:id ");
            $req->bindParam(":id",$_SESSION['user']['id']);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function setVote($idPropo){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("INSERT INTO `vote`(`proposition`, `utilisateur`) VALUES (:proposition,:utilisateur)");
            $req->bindParam(":proposition",$idPropo);
            $req->bindParam(":utilisateur",$_SESSION['user']['id']);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

function unSetVote($idPropo){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM `vote` WHERE proposition=:proposition and utilisateur=:utilisateur)");
        $req->bindParam(":proposition",$idPropo);
        $req->bindParam(":utilisateur",$_SESSION['user']['id']);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}