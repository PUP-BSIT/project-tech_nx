<?php
include "dataconnection.php";

$name = $_POST['name'];
$age = $_POST['age'];
$species = $_POST['species'];
$breed = $_POST['breed'];
$gender = $_POST['gender'];
$profile_image = $_POST['profile_image'];

$sql = "INSERT INTO pets (name, age, species, breed, gender, profile_image) 
VALUES ('$name', $age, '$species', '$breed', '$gender', '$profile_image')";

if (mysqli_query($conn, $sql)) {
    echo "New pet added successfully";
} else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
}

mysqli_close($conn);
?>