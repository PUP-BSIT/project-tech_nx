<?php
include "dataconnection.php";
header('Content-Type: application/json');

$data = array();

if ($conn) {
    $sql = "SELECT `status`, COUNT(*) as count
            FROM `schedule`
            WHERE MONTH(`current_datetimestamp`) = MONTH(CURRENT_DATE())
            AND YEAR(`current_datetimestamp`) = YEAR(CURRENT_DATE())
            GROUP BY `status`";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            $data[] = array('status' => 'No data', 'count' => 0);
        }
    } else {
        $data[] = array('status' => 'Error', 'count' => 0);
        error_log("SQL Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
} else {
    $data[] = array('status' => 'Error', 'count' => 0);
    error_log("Connection Error: " . mysqli_connect_error());
}

echo json_encode($data);
?>
