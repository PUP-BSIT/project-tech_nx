<?php
$servername = "srv1367.hstgr.io";
$username = "u945995174_pawtechnx";
$password = "TECHNiX_123456789";
$dbname = "u945995174_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "connected!";

?>