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

// SQL query to check user credentials
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Set session variables
    $_SESSION['username'] = $username;
    
    // Redirect to home page after successful login
    header('Location: home_page.php');
    exit();
} else {
    echo "Invalid username or password";
}

mysqli_close($conn);
?>
