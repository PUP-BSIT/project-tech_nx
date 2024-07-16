<?php
header('Content-Type: application/json');

include 'dataconnection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['name'], $data['id'], $data['date'], $data['type'], $data['status'])) {
  $name = mysqli_real_escape_string($conn, $data['name']);
  $id = mysqli_real_escape_string($conn, $data['id']);
  $date = mysqli_real_escape_string($conn, $data['date']);
  $type = mysqli_real_escape_string($conn, $data['type']);
  $status = mysqli_real_escape_string($conn, $data['status']);

  $query = "INSERT INTO schedule (name, pet_id, date, type, status) VALUES ('$name', '$id', '$date', '$type', '$status')";

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
