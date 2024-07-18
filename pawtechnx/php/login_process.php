<?php
include "dataconnection.php";
session_start();
header('Content-Type: application/json');

$response = array();

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (empty($username) || empty($password)) {
    $response['status'] = 'error';
    $response['message'] = 'Both fields are required.';
    echo json_encode($response);
    exit();
}

$sql_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result_admin = mysqli_query($conn, $sql_admin);

if (mysqli_num_rows($result_admin) == 1) {
    $row = mysqli_fetch_assoc($result_admin);
    $_SESSION['user_id'] = $row['admin_id'];
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin';

    $response['status'] = 'success';
    $response['redirect'] = 'dashboard.php';
    echo json_encode($response);
    exit();
}

$sql_user = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result_user = mysqli_query($conn, $sql_user);

if (mysqli_num_rows($result_user) == 1) {
    $row = mysqli_fetch_assoc($result_user);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'user';

    $response['status'] = 'success';
    $response['redirect'] = '../php/home_page.php';
    echo json_encode($response);
    exit();
}

$response['status'] = 'error';
$response['message'] = 'Invalid username or password';
echo json_encode($response);

mysqli_close($conn);
?>
