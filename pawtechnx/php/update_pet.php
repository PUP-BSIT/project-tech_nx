<?php
include "dataconnection.php";

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