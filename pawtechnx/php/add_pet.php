<?php
include "dataconnection.php";

// Function to generate pet_ID in the format PT-001-PTX
function generatePetID($conn) {
    $sql = "SELECT MAX(CAST(SUBSTRING(pet_ID, 4, 3) AS UNSIGNED)) AS max_id FROM pet_details";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];
    
    $new_id = $max_id + 1;
    
    $formatted_id = sprintf("PT-%03d-PTX", $new_id);
    
    return $formatted_id;
}

function sanitizeInput($conn, $data) {
    return mysqli_real_escape_string($conn, htmlspecialchars(stripslashes(trim($data))));
}

// Retrieve POST data and sanitize
$Name = isset($_POST['name']) ? sanitizeInput($conn, $_POST['name']) : '';
$Age = isset($_POST['age']) ? sanitizeInput($conn, $_POST['age']) : '';
$Species = isset($_POST['species']) ? sanitizeInput($conn, $_POST['species']) : '';
$Breed = isset($_POST['breed']) ? sanitizeInput($conn, $_POST['breed']) : '';
$Gender = isset($_POST['gender']) ? sanitizeInput($conn, $_POST['gender']) : '';
$Weight = isset($_POST['weight']) ? sanitizeInput($conn, $_POST['weight']) : '';
$Height = isset($_POST['height']) ? sanitizeInput($conn, $_POST['height']) : '';
$Availability = isset($_POST['availability']) ? sanitizeInput($conn, $_POST['availability']) : '';
$profile_img = "";
$gallery_paths = "";

// Handle profile image upload
if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] == 0) {
    $target_dir = "../images/uploaded/profiles/";
    $target_file = $target_dir . basename($_FILES["profile_img"]["name"]);
    if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file)) {
        $profile_img = $target_file;
    } else {
        echo "Error uploading profile image.";
    }
} elseif (isset($_POST['imageOption']) && $_POST['imageOption'] == 'url') {
    $profile_img = isset($_POST['profile_image']) ? sanitizeInput($conn, $_POST['profile_image']) : '';
}

// Handle gallery image upload
if (isset($_FILES['gallery_paths']) && !empty($_FILES['gallery_paths']['name'][0])) {
    $gallery_paths_array = array();
    $target_dir = "../images/uploaded/gallery/";

    foreach ($_FILES['gallery_paths']['name'] as $key => $name) {
        $target_file = $target_dir . basename($name);
        if (move_uploaded_file($_FILES['gallery_paths']['tmp_name'][$key], $target_file)) {
            $gallery_paths_array[] = $target_file;
        } else {
            echo "Error uploading gallery image: " . $name;
        }
    }

    $gallery_paths = implode(",", $gallery_paths_array);
}

$pet_ID = generatePetID($conn);

// Insert into database if all required fields are present
if ($pet_ID && $Name && $Age && $Species && $Breed && $Gender && $Weight && $Height && $profile_img && $Availability) {
    // Prepare and bind parameters
    $sql = "INSERT INTO pet_details (pet_ID, Name, Age, Species, Breed, Gender, Weight, Height, profile_img, Availability, gallery_paths, current_datetimestamp, updated_timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssss", $pet_ID, $Name, $Age, $Species, $Breed, $Gender, $Weight, $Height, $profile_img, $Availability, $gallery_paths);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "Error: Missing required fields.<br>";
}

mysqli_close($conn);

?>
