<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'dataconnection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $pet_id = $_POST['delete'];
     
    $pet_id = mysqli_real_escape_string($conn, $pet_id);

    $sql = "DELETE FROM pet_details WHERE pet_ID='$pet_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Pet deleted successfully.";
    } else {
        echo "Error deleting pet: " . mysqli_error($conn);
    }
} else {
    echo "No pet ID provided.";
}

mysqli_close($conn);
?>
