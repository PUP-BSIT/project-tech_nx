<?php
session_start();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "db_adoption";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Escape variables for security
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$email = mysqli_real_escape_string($conn, $email);

// SQL query to insert user data
$sql = "INSERT INTO users (username, password, email, role) 
        VALUES ('$username', '$password', '$email', 'adopter')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    // Redirect to login page after successful registration
    header('Location: login.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
