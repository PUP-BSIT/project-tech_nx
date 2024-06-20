<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption_system";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT id, name, email, phone, address, profile_image, created_at
        FROM users";
$result = $conn->query($sql);

$users = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         $users[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($users);
?>