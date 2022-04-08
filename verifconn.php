<?php

include 'conn.php';

$Nom = $_POST['Name'];
$Prenom = $_POST['Prenom'];
$maile = $_POST['email'];
$tel = $_POST['tel'];
$dateA = $_POST['arriver'];
$dateD = $_POST['depart'];
$numchambre = $_POST['numchambre'];

$sql = "CALL ajouterReservationWeb (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$Nom, $Prenom, $maile, $tel, $dateA, $dateD, $numchambre]);

$sql = "UPDATE chambre SET dispo = '1' WHERE chambreid = ?";
$stmt = $conn->prepare($sql);
$stmt -> execute([$numchambre]);

$sm = "Nouvelle réservation effectuer";
header("Location: Reserver.php?error=$sm");