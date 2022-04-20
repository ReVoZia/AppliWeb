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

$sql = "CALL updateChambre(?,?)";
$stmt = $conn->prepare($sql);
$stmt -> execute(['1', $numchambre]);

$sm = "Nouvelle reservation effectuer";
header("Location: Reserver.php?error=$sm");
