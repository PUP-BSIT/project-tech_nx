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

$sql = "DELETE FROM pets WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Pet deleted successfully";
    } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>