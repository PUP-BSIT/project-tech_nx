<?php
$servername = "localhost";
$database = "db_pawtechnx";
$username = "root";
$password = "";
 
$conn = mysqli_connect($servername, $username, $password,  $database);
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
} 

function admincodeExists($conn, $admin_code) {
    $email = mysqli_real_escape_string($conn, $admin_code);

    $sql = "SELECT admin_id FROM admin WHERE Admin_Code = '$admin_code'";
    $result = mysqli_query($conn, $sql);

    return ($result && mysqli_num_rows($result) > 0);

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $admin_code = $_POST['admin_code'];
    $password = $_POST['password'];

    if (empty($fname) || empty($lname) || empty($admin_code) 
      || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    if (admincodeExists($conn, $admin_code)) {
        echo "Admin code already exists. Please use a different admin code.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $hashed_password = mysqli_real_escape_string($conn, $hashed_password);

    $sql = "INSERT INTO `admin`(`Firstname`, `Lastname`, 
      `Admin_Code`, `Password`) 
      VALUES ('$fname','$lname','$admin_code','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);

?>