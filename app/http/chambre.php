<?php

function getChambreDispo($conn){
    $sql = "CALL chambreDispo();";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 1){
        $chambren = $stmt->fetchAll();
        return $chambren;
    }else{
        $chambren = [];
        return $chambren;
    }
}

function getAllReservation($conn){
    $sql = "CALL recupReservation();";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 1){
        $reservations = $stmt->fetchAll();
        return $reservations;
    }else{
        $reservations = [];
        return $reservations;
    }
}

function getReservationByName($nom, $conn){
    $sql = "CALL recupReservationByNom(?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom]);
    if ($stmt->rowCount() > 1){
        $reservation = $stmt->fetch();
        return $reservation;
    }else{
        $reservation = [];
        return $reservation;
    }
}

?>