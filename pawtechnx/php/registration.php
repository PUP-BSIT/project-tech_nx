<?php
include "dataconnection.php";

function emailExists($conn, $email) {
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT user_id FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);

    return ($result && mysqli_num_rows($result) > 0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm'];

    if (empty($fname) || empty($lname) || empty($contact) || empty($email) 
      || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
        exit();
    }

    if (emailExists($conn, $email)) {
        echo "Email already exists. Please use a different email.";
        exit();
    }

    if ($password !== $confirm_password) {
        echo "Password and confirm password do not match.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $hashed_password = mysqli_real_escape_string($conn, $hashed_password);

    $sql = "INSERT INTO users (Firstname, Lastname, Contact, Email, Password) 
            VALUES ('$fname', '$lname', '$contact', '$email', 
              '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
