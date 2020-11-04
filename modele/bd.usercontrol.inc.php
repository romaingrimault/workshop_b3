<?php

include_once "bd.inc.php";

function connexion($identifiant,$mdp){
$success=false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('SELECT nom FROM utilisateur where email=:identifiant and passeword=:mdp');
        $req->bindParam(":identifiant",$identifiant);
        $req->bindParam(":mdp",$mdp);

        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultat)==1){
            $_SESSION['user']=$resultat[0]['nom'];
            $success=true;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $success;
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

function getVille(){
    $ret=false;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('SELECT id,nom FROM ville ');
        $req->bindParam(":mail",$mail);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}