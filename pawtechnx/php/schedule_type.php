<?php
include "dataconnection.php";
header('Content-Type: application/json');

$sql = "SELECT `type`, COUNT(*) as count FROM `schedule` 
 WHERE MONTH(`current_datetimestamp`) = MONTH(CURRENT_DATE()) 
 AND YEAR(`current_datetimestamp`) = YEAR(CURRENT_DATE()) GROUP BY `type`";

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
