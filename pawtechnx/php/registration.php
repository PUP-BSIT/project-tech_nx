<?php
include "dataconnection.php"; 

function emailExists($conn, $email) {
    $email = mysqli_real_escape_string($conn, $email); 

    $sql = "SELECT user_id FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);

    return ($result && mysqli_num_rows($result) > 0);
}

function generateUserId($conn) {
    $sql = "SELECT MAX(user_id) AS max_id FROM users";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $new_id = 1;
    if ($row['max_id']) {
        $max_id = (int)substr($row['max_id'], 3, 3); 
        $new_id = $max_id + 1;
    }
    
    return 'US-' . str_pad($new_id, 3, '0', STR_PAD_LEFT) . '-PTX';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm'];

    if (empty($fname) || empty($lname) || empty($contact) || empty($email) || empty($password) || empty($confirm_password)) {
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

    $user_id = generateUserId($conn);

    $sql = "INSERT INTO users (user_id, Firstname, Lastname, Contact, Email, Password) 
            VALUES ('$user_id', '$fname', '$lname', '$contact', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn); 
?>