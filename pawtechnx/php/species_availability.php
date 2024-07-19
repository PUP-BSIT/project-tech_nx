<?php
include "dataconnection.php";
header('Content-Type: application/json');

$sql = "SELECT Species, COUNT(*) as count
        FROM pet_details
        WHERE Availability = 'Adopted'
        AND MONTH(current_datetimestamp) = MONTH(CURRENT_DATE())
        AND YEAR(current_datetimestamp) = YEAR(CURRENT_DATE())
        GROUP BY Species";

$result = mysqli_query($conn, $sql);

$data = array();

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}

echo json_encode($data);

mysqli_close($conn);
?>
