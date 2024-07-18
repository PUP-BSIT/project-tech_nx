<?php
header('Content-Type: application/json');

include 'dataconnection.php';

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'No pet ID provided']);
    exit;
}

$petID = mysqli_real_escape_string($conn, $_GET['id']);

$query = "
    SELECT `pet_ID`, `Name`, `Age`, `Species`, `Breed`, `Gender`, `Weight`, `Height`, `profile_img`, `gallery_paths`
    FROM pet_details
    WHERE pet_ID = '$petID'
";

$result = mysqli_query($conn, $query);

if ($result) {
    $pet = mysqli_fetch_assoc($result);
    if ($pet) {
        // Convert gallery_paths to an array
        $pet['gallery'] = $pet['gallery_paths'] ? explode(',', $pet['gallery_paths']) : [];
        unset($pet['gallery_paths']); // Remove the original gallery_paths field

        echo json_encode($pet);
    } else {
        echo json_encode(['error' => 'No pet found with the provided ID']);
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
