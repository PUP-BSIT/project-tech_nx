<?php
// Include your database connection script
include 'dataconnection.php';

// Check if the request method is PATCH
if ($_SERVER["REQUEST_METHOD"] == "PATCH") {
    // Retrieve pet ID from the query string
    $pet_ID = $_GET['id'];

    // Get data from the request body
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $species = $_POST['Species'];
    $breed = $_POST['Breed'];
    $gender = $_POST['Gender'];
    $weight = $_POST['Weight'];
    $height = $_POST['Height'];
    $availability = $_POST['Availability'];

    // Escape variables for security (if needed)
    $name = mysqli_real_escape_string($conn, $name);
    $age = mysqli_real_escape_string($conn, $age);
    $species = mysqli_real_escape_string($conn, $species);
    $breed = mysqli_real_escape_string($conn, $breed);
    $gender = mysqli_real_escape_string($conn, $gender);
    $weight = mysqli_real_escape_string($conn, $weight);
    $height = mysqli_real_escape_string($conn, $height);
    $availability = mysqli_real_escape_string($conn, $availability);

    // Prepare SQL update statement
    $sql = "UPDATE pet_details SET 
            Name='$name', 
            Age='$age', 
            Species='$species', 
            Breed='$breed', 
            Gender='$gender', 
            Weight='$weight', 
            Height='$height', 
            Availability='$availability'
            WHERE pet_ID='$pet_ID'";

    // Execute SQL update
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("message" => "Pet details updated successfully"));
    } else {
        echo json_encode(array("error" => "Error updating pet details: " . mysqli_error($conn)));
    }
} else {
    // If method is not PATCH, return an error
    echo json_encode(array("error" => "Invalid request method"));
}

// Close database connection
mysqli_close($conn);
?>
