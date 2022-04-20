<?php

function getUtilById($utilId, $conn){
    $sql = "CALL recupUtilisateur(?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$utilId]);

    if ($stmt->rowCount() == 1){
        $utilisateur = $stmt->fetch();
        return $utilisateur;
    }else{
        $utilisateur = [];
        return $utilisateur;
    }
}

function getUtilByNom($nom, $conn){
    $sql = "CALL recupUtilisateurByNom(?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom]);

    if ($stmt->rowCount() == 1){
        $utilisateur = $stmt->fetch();
        return $utilisateur;
    }else{
        $utilisateur = [];
        return $utilisateur;
    }
}