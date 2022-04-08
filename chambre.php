<?php

function getChambreDispo($conn){
    $sql = "SELECT chambreid FROM Chambre WHERE dispo = 0 ORDER BY chambreid";
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

?>