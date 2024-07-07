<?php
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $monthly_salary = $_POST['monthly_salary'];
    $pet_interest = $_POST['pet_interest'];
    $reason = $_POST['reason'];
    
    $servername = "srv1367.hstgr.io";
    $username = "u945995174_pawtechnx";
    $password = "TECHNiX_123456789";
    $dbname = "u945995174_project";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if(!$conn) {
        die('Connection Failed : '.mysqli_connect_error());
    }
    
    $query = "INSERT INTO adoption_form (full_name, email, contact_number, 
        address, monthly_salary, pet_interest, reason) 
        VALUES ('$full_name','$email', '$contact_number', '$address', 
        '$monthly_salary', '$pet_interest', '$reason')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: ../html/adoption_success.html");
    } else {
        die("Connection Failed: ".mysqli_connect_error());
    }

    mysqli_close($conn);
?>