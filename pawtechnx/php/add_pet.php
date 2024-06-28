<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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