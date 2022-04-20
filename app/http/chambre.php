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
    $sql = "CALL recupReservations();";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
        $reservations = $stmt->fetchAll();
        return $reservations;
    }else{
        $reservations = [];
        return $reservations;
    }
}

function getReservationByUtil($utilId, $conn){
    $sql = "CALL recupReservationByUtil(?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$utilId]);
    if ($stmt->rowCount() == 1){
        $reservation = $stmt->fetch();
        return $reservation;
    }else{
        $reservation = [];
        return $reservation;
    }
}

?>