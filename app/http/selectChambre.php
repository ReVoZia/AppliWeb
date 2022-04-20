<?php

include 'conn.php';

$option = $_POST['option'];
$nom = $_POST['nomreservation'];

if ($option === 'Modifier'){
    header("Location: ../../editReservation.php?nom=$nom");
} else if ($option === 'Supprimer'){
    $sql = "CALL deletereservation(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom]);

    $sm = "Reservation supprimer";
    header("Location: Reserver.php?error=$sm");
}
