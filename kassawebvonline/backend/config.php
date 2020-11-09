<?php
//<!-- Het opzetten vat de databaseconnectie -->
session_start();

 

$dbName = 'contactenlijst';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';


$conn   = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
// $conn  -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);

 

?>