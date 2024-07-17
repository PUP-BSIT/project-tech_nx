<?php
include "dataconnection.php";

function generateUserID($conn) {
  $sql = "SELECT MAX(CAST(SUBSTRING(user_id, 4, 3) AS UNSIGNED)) AS max_id FROM users";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $max_id = $row['max_id'];
  
  $new_id = $max_id + 1;
  
  $formatted_id = sprintf("US-%03d-PTX", $new_id);
  
  return $formatted_id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $source_of_income = mysqli_real_escape_string($conn, $_POST['source_of_income']); 
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $role = "user"; 

  $user_id = generateUserID($conn);

  $sql = "INSERT INTO users (user_id, username, Firstname, Lastname, Email, Address, Contact_Number, Source_of_Income, Password, role) 
          VALUES ('$user_id', '$username', '$fname', '$lname', '$email', '$address', '$contact', '$source_of_income', '$password', '$role')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
