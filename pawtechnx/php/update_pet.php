<?php
include 'dataconnection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $pet_ID = $_GET['id'];

    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $species = $_POST['Species'];
    $breed = $_POST['Breed'];
    $gender = $_POST['Gender'];
    $weight = $_POST['Weight'];
    $height = $_POST['Height'];
    $availability = $_POST['Availability'];

    $name = mysqli_real_escape_string($conn, $name);
    $age = mysqli_real_escape_string($conn, $age);
    $species = mysqli_real_escape_string($conn, $species);
    $breed = mysqli_real_escape_string($conn, $breed);
    $gender = mysqli_real_escape_string($conn, $gender);
    $weight = mysqli_real_escape_string($conn, $weight);
    $height = mysqli_real_escape_string($conn, $height);
    $availability = mysqli_real_escape_string($conn, $availability);

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

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("message" => "Pet details updated successfully"));
    } else {
        echo json_encode(array("error" => "Error updating pet details: " . mysqli_error($conn)));
    }
} else {
    echo json_encode(array("error" => "Invalid request method"));
}

mysqli_close($conn);
?>
