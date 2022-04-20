<?php

include '../conn.php';
include 'chambre.php';

$option = $_POST['option'];
$nom = $_POST['nomreservation'];
$utilId = (int) filter_var($nom, FILTER_SANITIZE_NUMBER_INT);

if ($option === 'Modifier'){
    header("Location: ../../editReservation.php?id=$utilId");
} else if ($option === 'Supprimer'){
    $reservation = getReservationByUtil($utilId, $conn);

    $sql = "CALL updateChambreDispo(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([0, $reservation['numchambre']]);

    $sql = "CALL deletereservation(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$reservation['id']]);


    $sm = "Reservation supprimer";
    header("Location: ../../selectReservation.php?error=$sm");
}
