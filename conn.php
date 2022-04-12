<?php

$sName = "127.0.0.1:8889";
//$sName = "172.29.108.29:3306";
$uName = "prof1234";
$pass = "prof_1234!";
$db_name = "reservationap";

try{
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connexion erreur : " . $e->getMessage();
}