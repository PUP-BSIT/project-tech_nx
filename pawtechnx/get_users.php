<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption_system";

$conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " .  mysqli_connect_error());
    }

$sql = "SELECT id, name, email, phone, address, profile_image, created_at
        FROM users";
$result = mysqli_query($conn, $sql);

$users = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         $users[] = $row;
    }
}

echo json_encode($users);

mysqli_close($conn);
?>