<?php
header('Content-Type: application/json');

include 'dataconnection.php';

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'No pet ID provided']);
    exit;
}

$petID = intval($_GET['id']);

$query = "
    SELECT `pet_ID`, `Name`, `Age`, `Species`, `Breed`, `Gender`, `Size`, 
    `profile_img`
    FROM pet_details
    WHERE pet_ID = $petID
";

$result = mysqli_query($conn, $query);

if ($result) {
    $pet = mysqli_fetch_assoc($result);
    if ($pet) {
        echo json_encode($pet);
    } else {
        echo json_encode(['error' => 'No pet found with the provided ID']);
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
