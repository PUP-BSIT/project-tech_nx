<?php
include "dataconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adoption_ID = $_POST['adoption_ID'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $current_datetimestamp = date('Y-m-d H:i:s');

    $sql = "INSERT INTO schedule (adoption_ID, name, date, type, status, current_datetimestamp, updated_datetimestamp) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $adoption_ID, $name, $date, $type, $status, $current_datetimestamp, $current_datetimestamp);

    if ($stmt->execute()) {
        echo "New schedule added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
