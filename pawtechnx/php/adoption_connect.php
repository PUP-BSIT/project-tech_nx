<?php
include "dataconnection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT user_id, Firstname, Lastname, Email, Address, Monthly_Salary, contact_number FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['Firstname'];
    $lname = $row['Lastname'];
    $email = $row['Email'];
    $address = $row['Address'];
    $salary = $row['Monthly_Salary'];
    $contact_number = $row['contact_number'];
} else {
    echo "Error fetching user data: " . mysqli_error($conn);
    exit();
}

$pet_id = $_POST['pet_id'];
$pet_interest = $_POST['pet_interest'];
$reason = $_POST['reason'];

$query = "SELECT COUNT(*) as count FROM `adoption_form`";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'] + 1;
} else {
    $count = 1;
}

$adoption_ID = 'ADP-' . str_pad($count, 3, '0', STR_PAD_LEFT) . '-PTX';

$sql = "INSERT INTO `adoption_form` (`adoption_ID`, `pet_ID`, `user_ID`, `Firstname`, `Lastname`, `Email`, `Contact_Number`, `Address`, `Monthly_Salary`, `pet_interest`, `Reason`) 
        VALUES ('$adoption_ID', '$pet_id', '$user_id', '$fname', '$lname', '$email', '$contact_number', '$address', '$salary', '$pet_interest', '$reason')";

if (mysqli_query($conn, $sql)) {
    echo "Application submitted successfully.";
    header("Location: ../html/adoption_success.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
