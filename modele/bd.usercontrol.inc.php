<?php

include_once "bd.inc.php";

function connexion($identifiant,$mdp){
$success=false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('SELECT id,nom,prenom,email,adresse,ville,age FROM utilisateur where email=:identifiant and passeword=:mdp');
        $req->bindParam(":identifiant",$identifiant);
        $req->bindParam(":mdp",$mdp);

        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultat)==1){
            setSession($resultat);

            $success=true;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $success;
}

function setSession($resultat){
    $_SESSION['user']['id']=$resultat[0]['id'];
    $_SESSION['user']['nom']=$resultat[0]['nom'];
    $_SESSION['user']['prenom']=$resultat[0]['prenom'];
    $_SESSION['user']['email']=$resultat[0]['email'];
    $_SESSION['user']['adresse']=$resultat[0]['adresse'];
    $_SESSION['user']['age']=$resultat[0]['age'];
    $_SESSION['user']['ville']= getVille($resultat[0]['ville']);
}

function  updateSession(){
    try {
    $cnx = connexionPDO();
    $req = $cnx->prepare('SELECT id,nom,prenom,email,adresse,ville,age FROM utilisateur where id=:id');
    $req->bindParam(":id", $_SESSION['user']['id']);
    $req->execute();
    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultat)==1){
        setSession($resultat);
    }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function inscription($prenom,$age,$nom,$mail,$mdp,$ville,$adresse){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `utilisateur`(`nom`, `prenom`, `age`, `email`, `passeword`, `adresse`, `ville`) VALUES (:nom,:prenom,:age,:email,:passeword,:adresse,:ville)");
        $req->bindParam(":nom",$nom);
        $req->bindParam(":prenom",$prenom);
        $req->bindParam(":age",$age);
        $req->bindParam(":email",$mail);
        $req->bindParam(":passeword",$mdp);
        $req->bindParam(":adresse",$adresse);
        $req->bindParam(":ville",$ville);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function chekAdresse($mail){
    $ret=false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('SELECT email FROM utilisateur where email=:mail');
        $req->bindParam(":mail",$mail);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($resultat)){
            $ret=true;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ret;
}
function update($prenom,$age,$nom,$mail,$ville,$adresse){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE `utilisateur` SET `nom`=:nom,`prenom`=:prenom,`age`=:age,`email`=:email,`adresse`=:adresse,`ville`=:ville WHERE id=:id');
        $req->bindParam(":nom",$nom);
        $req->bindParam(":prenom",$prenom);
        $req->bindParam(":age",$age);
        $req->bindParam(":email",$mail);
        $req->bindParam(":adresse",$adresse);
        $req->bindParam(":ville",$ville);
        $req->bindParam(":id",$_SESSION['user']['id']);
        $req->execute();
        updateSession();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getVille($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('SELECT nom FROM ville where id=:id ');
        $req->bindParam(":id",$id);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat[0];
}
function getAllVille(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('SELECT id,nom FROM ville  ');
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}