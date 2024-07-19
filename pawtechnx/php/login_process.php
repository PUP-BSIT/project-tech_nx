<?php
include "dataconnection.php";
header('Content-Type: application/json');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$response = ['status' => 'error', 'message' => 'Invalid username or password'];

if (isset($username) && isset($password)) {
    $sql_admin = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
    $result_admin = mysqli_query($conn, $sql_admin);

    if ($result_admin && mysqli_num_rows($result_admin) == 1) {
        $row = mysqli_fetch_assoc($result_admin);
        $_SESSION['user_id'] = $row['admin_ID'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        
        $response = ['status' => 'success', 'redirect' => '../php/dashboard.php'];
    } else {
        $sql_user = "SELECT * FROM users WHERE username = '$username' AND Password = '$password'";
        $result_user = mysqli_query($conn, $sql_user);

        if ($result_user && mysqli_num_rows($result_user) == 1) {
            $row = mysqli_fetch_assoc($result_user);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';
            
            $response = ['status' => 'success', 'redirect' => '../php/home_page.php'];
        }
    }
}

echo json_encode($response);
mysqli_close($conn);
?>
