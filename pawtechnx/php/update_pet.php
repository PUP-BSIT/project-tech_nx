<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$species = $_POST['species'];
$breed = $_POST['breed'];
$gender = $_POST['gender'];
$profile_image = $_POST['profile_image'];

$sql = "UPDATE pets SET name='$name',age=$age, species='$species', 
breed='$breed', gender='$gender' profile_image='$profile_image' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Pet updated successfully";
} else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
}

mysqli_close($conn);
?>