<?php

$sName = "127.0.0.1:8889";
$sName = "localhost";
$uName = "Valentin";
$pass = "kilabilon";
$db_name = "matheo";

try{
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connexion erreur : " . $e->getMessage();
}