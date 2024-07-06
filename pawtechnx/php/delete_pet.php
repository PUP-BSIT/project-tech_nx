<?php
include "dataconnection.php";

$id = $_POST['id'];

$sql = "DELETE FROM pets WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Pet deleted successfully";
} else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
}

mysqli_close($conn);
?>