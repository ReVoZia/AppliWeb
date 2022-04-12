<?php
include 'conn.php';

$Nom = $_POST('Name');
$newnumchambre = $_POST('nnc');
$anciennumchambre = $_POST('anc');

$sql = "CALL updateUserW(?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$Nom, $newnumchambre, $anciennumchambre]);
    
    $sm = "Nouvelle réservation effectuer";
header("Location: Reserver.php?error=$sm");