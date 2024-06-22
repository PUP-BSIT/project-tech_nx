<?php
$servername = "localhost";
$database = "db_pawtechnx";
$username = "root";
$password = "";
 
$conn = mysqli_connect($servername, $username, $password,  $database);
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
<<<<<<< HEAD
}
=======
 
} 
>>>>>>> 5615069904b3655ae591a7b4e05902dbb4d69484
?>