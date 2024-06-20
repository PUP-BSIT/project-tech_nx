<?php
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $monthly_salary = $_POST['monthly_salary'];
    $pet_interest = $_POST['pet_interest'];
    $reason = $_POST['reason'];

    $conn = new mysqli('localhost','root','','adoption_form');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into adoption form(full_name, email,
            contact_number, address, monthly_salary, pet_interest, reason)
            values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $full_name, $email, $contact_number, 
            $address, $monthly_salary, $pet_interest, $reason);
        $stmt->execute();
        echo "registration sucessfully...";
        $stmt->close();
        $conn->close();
    }
?>