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
$species = $_POST['species'];
$breed = $_POST['breed'];
$age = $_POST['age'];
$profile_image = $_POST['profile_image'];

$sql = "INSERT INTO pets (name, species, breed, age, profile_image) VALUES 
('$name', '$species', '$breed', $age, '$profile_image')";

    if (mysqli_query($conn, $sql)) {
    echo "New pet added successfully";
    }  else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>