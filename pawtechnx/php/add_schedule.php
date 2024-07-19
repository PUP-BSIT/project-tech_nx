<?php
function generateScheduleID($conn) {
    $sql = "SELECT schedule_ID FROM schedule ORDER BY schedule_ID DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastID = $row['schedule_ID'];

        $number = (int)substr($lastID, 4, 3);
        $number++;
        $newID = 'SCH-' . str_pad($number, 3, '0', STR_PAD_LEFT) . '-PTX';
    } else {
        $newID = 'SCH-001-PTX';
    }

    return $newID;
}

include "dataconnection.php";

$schedule_ID = generateScheduleID($conn);

$adoption_ID = $_POST['adoption_ID'];
$name = $_POST['name'];
$date = $_POST['date'];
$type = $_POST['type'];
$status = $_POST['status'];

$sql = "INSERT INTO schedule (schedule_ID, adoption_ID, name, date, type, status) 
        VALUES ('$schedule_ID', '$adoption_ID', '$name', '$date', '$type', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header('Location: ../php/dashboard.php');
exit();
?>
