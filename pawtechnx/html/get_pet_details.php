<?php
header('Content-Type: application/json');

$servername = "localhost";
$database = "petss";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo json_encode(['error' => 'Database connection failed: ' .
     mysqli_connect_error()]);
    exit();
}

$query = "
    SELECT pet_ID, name, age, species, profile_image
    FROM pet_details
    ORDER BY species, pet_ID
";
$result = mysqli_query($conn, $query);

if ($result) {
    $pets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pets[$row['species']][] = $row;
    }
    echo json_encode($pets);
} else {
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
