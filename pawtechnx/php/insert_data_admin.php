<?php
header('Content-Type: application/json');
include 'dataconnection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['schedule_ID']) && isset($data['adoption_ID']) && isset($data['name']) && isset($data['date']) && isset($data['type']) && isset($data['status'])) {
    $schedule_ID = mysqli_real_escape_string($conn, $data['schedule_ID']);
    $adoption_ID = mysqli_real_escape_string($conn, $data['adoption_ID']);
    $name = mysqli_real_escape_string($conn, $data['name']);
    $date = mysqli_real_escape_string($conn, $data['date']);
    $type = mysqli_real_escape_string($conn, $data['type']);
    $status = mysqli_real_escape_string($conn, $data['status']);

    $query = "INSERT INTO schedule (schedule_ID, adoption_ID, name, date, type, status) VALUES ('$schedule_ID', '$adoption_ID', '$name', '$date', '$type', '$status')";

    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true, 'message' => 'Adoption meeting scheduled successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Incomplete data']);
}

mysqli_close($conn);
?>