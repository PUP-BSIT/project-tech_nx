<?php
include 'dataconnection.php';
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['schedule_ID']) && isset($data['name']) && isset($data['date']) && isset($data['type']) && isset($data['status']) && isset($data['adoption_ID'])) {
    $schedule_ID = mysqli_real_escape_string($conn, $data['schedule_ID']);
    $name = mysqli_real_escape_string($conn, $data['name']);
    $date = mysqli_real_escape_string($conn, $data['date']);
    $type = mysqli_real_escape_string($conn, $data['type']);
    $status = mysqli_real_escape_string($conn, $data['status']);
    $adoption_ID = mysqli_real_escape_string($conn, $data['adoption_ID']);

    $check_adoption_query = "SELECT * FROM adoption_form WHERE adoption_ID = '$adoption_ID'";
    $check_adoption_result = mysqli_query($conn, $check_adoption_query);

    if (mysqli_num_rows($check_adoption_result) > 0) {
        $insert_query = "INSERT INTO schedule (schedule_ID, name, date, type, status, adoption_ID) VALUES ('$schedule_ID', '$name', '$date', '$type', '$status', '$adoption_ID')";

        if (mysqli_query($conn, $insert_query)) {
            echo json_encode(['success' => true, 'message' => 'Schedule added successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error inserting schedule: ' . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid Adoption ID']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
}

mysqli_close($conn);
?>
