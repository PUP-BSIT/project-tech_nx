<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

$sql = "SELECT id, name, species, breed, age, profile_image, created_at FROM pets";
$result = mysqli_query($conn, $sql);

$pets = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
           $pets[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($pets);
?>