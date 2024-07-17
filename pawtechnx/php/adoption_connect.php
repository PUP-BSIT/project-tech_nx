<?php
include "dataconnection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$query_user = "SELECT user_id, Firstname, Lastname, Email, Address, Source_of_Income, contact_number FROM users WHERE user_id = '$user_id'";
$result_user = mysqli_query($conn, $query_user);

if ($result_user && mysqli_num_rows($result_user) > 0) {
    $row_user = mysqli_fetch_assoc($result_user);
    $fname = $row_user['Firstname'];
    $lname = $row_user['Lastname'];
    $email = $row_user['Email'];
    $address = $row_user['Address'];
    $salary = $row_user['Source_of_Income'];
    $contact_number = $row_user['contact_number'];
} else {
    echo "Error fetching user data: " . mysqli_error($conn);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = mysqli_real_escape_string($conn, $_POST['pet_id']);
    $pet_interest = mysqli_real_escape_string($conn, $_POST['pet_interest']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);

    if (empty($pet_id)) {
        echo "Error: pet_id is not set.";
        exit();
    }

    $check_query = "SELECT availability FROM pet_details WHERE pet_ID = '$pet_id'";
    $check_result = mysqli_query($conn, $check_query);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $availability = $row['availability'];

        if ($availability == 'Available') {
            $query_count = "SELECT COUNT(*) as count FROM adoption_form";
            $result_count = mysqli_query($conn, $query_count);
            
            if ($result_count && mysqli_num_rows($result_count) > 0) {
                $row_count = mysqli_fetch_assoc($result_count);
                $count = $row_count['count'] + 1;
            } else {
                $count = 1;
            }

            $adoption_ID = 'ADP-' . str_pad($count, 3, '0', STR_PAD_LEFT) . '-PTX';

            $insert_query = "INSERT INTO adoption_form 
                            (`adoption_ID`, `pet_ID`, `user_ID`, `Firstname`, `Lastname`, `Email`, `Contact_Number`, `Address`, `Source_of_Income`, `pet_interest`, `Reason`)
                            VALUES ('$adoption_ID', '$pet_id', '$user_id', '$fname', '$lname', '$email', '$contact_number', '$address', '$salary', '$pet_interest', '$reason')";

            if (mysqli_query($conn, $insert_query)) {
                $update_query = "UPDATE pet_details SET availability = 'Adopted' WHERE pet_ID = '$pet_id'";
                if (mysqli_query($conn, $update_query)) {
                    header("Location: ../html/adoption_success.html");
                    exit();
                } else {
                    echo "Error updating pet availability: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting adoption form: " . mysqli_error($conn);
            }
        } else {
            echo "Pet is not available for adoption.";
        }
    } else {
        echo "Error checking pet availability: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
