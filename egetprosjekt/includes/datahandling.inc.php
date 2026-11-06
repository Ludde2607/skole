
<?php

require_once "dbh.inc.php";

// Receive JSON data
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    die("Ingen data mottatt");
}

// Get the values
$by_navn = $data["by_navn"];
$vær = $data["vær"];
$temp = $data["temp"];

// Insert into database
$sql = "INSERT INTO datavær 
        (by_navn, vær, temp)
        VALUES (?, ?, ?)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $by_navn,
    $vær,
    $temp,
]);

echo "Data lagret!";
?>


