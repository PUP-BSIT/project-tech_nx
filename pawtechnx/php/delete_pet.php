<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection file
include 'dataconnection.php';

// Check if the delete parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $pet_id = $_POST['delete'];

    // Sanitize the pet_ID to prevent SQL injection
    $pet_id = mysqli_real_escape_string($conn, $pet_id);

    // Construct the SQL query to delete the pet record
    $sql = "DELETE FROM pet_details WHERE pet_ID='$pet_id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Pet deleted successfully.";
    } else {
        echo "Error deleting pet: " . mysqli_error($conn);
    }
} else {
    echo "No pet ID provided.";
}

// Close connection
mysqli_close($conn);
?>
