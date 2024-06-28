<?php
$servername = "localhost";
$database = "u945995174_project";
$username = "u945995174_pawtechnx";
$password = "TECHNiX123456789";
 
$conn = mysqli_connect($servername, $username, $password,  $database);
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
}
?>