<?php

include_once "bd.inc.php";

function getLastProposision(){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT titre,id,description,dateCreation, COUNT(vote.proposition) as nbVote FROM proposition  left join vote on vote.proposition=proposition.id group by id order by dateCreation desc ");

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
        $req = $cnx->prepare("SELECT titre,id,description,dateCreation, COUNT(vote.proposition) as nbVote FROM proposition left  join vote on vote.proposition=proposition.id group by id order by nbVote desc");

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
        $req = $cnx->prepare("SELECT titre,id,description,dateCreation, COUNT(vote.proposition) as nbVote FROM proposition p left join vote on vote.proposition=p.id where p.utilisateur=:id group by id order by dateCreation desc ");
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
            $req = $cnx->prepare("SELECT titre,id,description,dateCreation, COUNT(vote.proposition) as nbVote FROM proposition left join vote on vote.proposition=proposition.id GROUP by	id order by nbVote desc");
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
        $req = $cnx->prepare("DELETE FROM `vote` WHERE proposition=:proposition and utilisateur=:utilisateur");
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
function lookVoted($idPropo){
    $voted=false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from vote where proposition=:proposition and utilisateur=:utilisateur");
        $req->bindParam(":proposition",$idPropo);
        $req->bindParam(":utilisateur",$_SESSION['user']['id']);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        if(count($resultat)==1)$voted=true;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $voted;
}
function addProposition($titre,$body){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("INSERT INTO `proposition`(`titre`, `description`, `utilisateur`) VALUES (:titre,:body,:utilisateur)");
            $req->bindParam(":titre",$titre);
            $req->bindParam(":body",$body);
            $req->bindParam(":utilisateur",$_SESSION['user']['id']);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
           // print "Erreur !: " . $e->getMessage();
           // die();
        }

}