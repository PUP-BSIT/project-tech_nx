<?php
header('Content-Type: application/json');
include 'dataconnection.php';

$query = "SELECT * FROM schedule";
$result = mysqli_query($conn, $query);

$schedules = [];
while ($row = mysqli_fetch_assoc($result)) {
    $schedules[] = $row;
}

echo json_encode($schedules);

mysqli_close($conn);
?>
