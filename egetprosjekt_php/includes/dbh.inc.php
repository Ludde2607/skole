<?php



$dsn = "mysql:host=localhost; dbname=værdata";
#Database brukernavn og passord. Endre om du har et annet brukernavn og passord
$dbusername = "root";
$dbpassword = "";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOExeption $e) {
    echo "Connection failed :" . $e->getMessage();
}

