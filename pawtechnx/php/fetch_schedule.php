<?php
include 'dataconnection.php';
header('Content-Type: application/json; charset=utf-8');

$query = "SELECT * FROM schedule";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Error fetching schedules: ' . mysqli_error($conn)]);
    exit;
}

$schedules = array();
while ($row = mysqli_fetch_assoc($result)) {
    $schedules[] = $row;
}

echo json_encode($schedules);

mysqli_close($conn);
?>
