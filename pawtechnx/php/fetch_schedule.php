<?php
include 'dataconnection.php';
header('Content-Type: application/json; charset=utf-8');

$query = "SELECT * FROM schedule";
$result = mysqli_query($conn, $query);

$schedules = array();
while ($row = mysqli_fetch_assoc($result)) {
    $schedules[] = $row;
}

echo json_encode($schedules);
mysqli_close($conn);
?>
