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

?>