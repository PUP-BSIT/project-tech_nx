<?php
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $monthly_salary = $_POST['monthly_salary'];
    $pet_interest = $_POST['pet_interest'];
    $reason = $_POST['reason'];
    
    $conn = mysqli_connect('localhost','root','','adoption_form');
    if(!$conn) {
        die('Connection Failed : '.mysqli_connect_error());
    } 

    $query = "INSERT INTO adoption (full_name, email, contact_number, 
        address, monthly_salary, pet_interest, reason) 
        VALUES ('$full_name', '$email', '$contact_number', '$address', 
        '$monthly_salary', '$pet_interest', '$reason')";
    
    if (mysqli_query($conn, $query)) {
        echo "adoption request sucessfully...";
    } else {
        die("Connection Failed: ".mysqli_connect_error());
    }

    mysqli_close($conn);
?>