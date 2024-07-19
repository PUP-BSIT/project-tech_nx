<?php
include "../php/dataconnection.php";
header('Content-Type: application/json');

$sql = "SELECT Species, COUNT(*) as count
        FROM pet_details
        WHERE MONTH(current_datetimestamp) = MONTH(CURRENT_DATE())
        AND YEAR(current_datetimestamp) = YEAR(CURRENT_DATE())
        GROUP BY Species";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
