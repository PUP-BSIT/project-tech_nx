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
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm'];

    if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
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

    $user_id = generateUserId($conn);

    $role = 'user'; 

    $sql = "INSERT INTO users (user_id, Firstname, Lastname, Username, Email, Password, role) 
            VALUES ('$user_id', '$fname', '$lname', '$username', '$email', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn); 
?>
