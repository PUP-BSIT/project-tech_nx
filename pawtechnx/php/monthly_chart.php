<?php
include "dataconnection.php";
header('Content-Type: application/json');

$sql = "
    SELECT MONTHNAME(current_datetimestamp) AS month, COUNT(*) AS count
    FROM adoption_form
    WHERE current_datetimestamp >= DATE_SUB(CURRENT_DATE(), INTERVAL 12 MONTH)
    GROUP BY MONTH(current_datetimestamp)
    ORDER BY MONTH(current_datetimestamp)
";

$result = $conn->query($sql);

$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>