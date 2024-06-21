<?php
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $monthly_salary = $_POST['monthly_salary'];
    $pet_interest = $_POST['pet_interest'];
    $reason = $_POST['reason'];
    
    $conn = new mysqli('localhost','root','','adoption_form');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } 

    $stmt = $conn->prepare("insert into adoption (full_name, email,
        contact_number, address, monthly_salary, pet_interest, reason)
        values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $full_name, $email, $contact_number, 
        $address, $monthly_salary, $pet_interest, $reason);
    
    if ($stmt->execute()) {
        echo "adoption request sucessfully...";
    } else {
        error_log("Error:".$stmt->error);
    }

    $stmt->close();
    $conn->close();  
?>