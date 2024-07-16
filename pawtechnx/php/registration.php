<?php
include "dataconnection.php";

function generateUserID($conn) {
  $sql = "SELECT COUNT(*) AS count FROM users";
  $result = mysqli_query($conn, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'] + 1;
  } else {
    $count = 1; 
  }

  $user_id = "US-" . str_pad($count, 3, "0", STR_PAD_LEFT) . "-PTX";
  return $user_id;
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$password = $_POST['password'];

$user_id = generateUserID($conn);


$sql = "INSERT INTO users (user_id, username, Firstname, Lastname, Email, Address, Contact_Number, Monthly_Salary, Password, role)
        VALUES ('$user_id', '$username', '$fname', '$lname', '$email', '$address', '$contact', '$salary', '$password', 'user')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location: ../html/login.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
