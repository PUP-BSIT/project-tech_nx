<?php
session_start();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "db_adoption";

$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO users (username, password, email, role) 
        VALUES ('$username', '$password', '$email', 'adopter')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: login.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>