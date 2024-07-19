<?php
include 'dataconnection.php';
if (isset($_GET['schedule_ID'])) {
    $schedule_ID = $_GET['schedule_ID'];

    $sql = "DELETE FROM schedule WHERE schedule_ID='$schedule_ID'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header('Location: ../php/dashboard.php');
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>
