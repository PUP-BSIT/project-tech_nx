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
$species = $_POST['species'];
$breed = $_POST['breed'];
$age = $_POST['age'];
$profile_image = $_POST['profile_image'];

$sql = "UPDATE pets SET name='$name', species='$species', breed='$breed', 
    age=$age, profile_image='$profile_image' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
       echo "Pet updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>