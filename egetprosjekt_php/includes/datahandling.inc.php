<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $by_navn = $_POST["by_navn"];
    $vær = $_POST["vær"];
    $temp = $_POST["temp"];
    

    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO datavær (by_navn, vær, temp) VALUE (?, ?, ?);";

        $stmt = $pdo->prepare($query); 

        $stmt->execute([$by_navn, $vær, $temp]);

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOExeption $e) {
        die("Query failed: " . $e->getMessage());
    }





} else {
    header("Location: ../index.php");
}