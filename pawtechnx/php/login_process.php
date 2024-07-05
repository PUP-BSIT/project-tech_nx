<?php
include "dataconnection.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result_admin = mysqli_query($conn, $sql_admin);

if (mysqli_num_rows($result_admin) == 1) {
    $row = mysqli_fetch_assoc($result_admin);
    $_SESSION['user_id'] = $row['admin_id'];
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin';

    header('Location: dashboard.php');
    exit();
}

$sql_user = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result_user = mysqli_query($conn, $sql_user);

if (mysqli_num_rows($result_user) == 1) {
    $row = mysqli_fetch_assoc($result_user);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'user';

    header('Location: home_page.php');
    exit();
}

echo "Invalid username or password";

mysqli_close($conn);
?>
