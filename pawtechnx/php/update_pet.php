<?php
include 'dataconnection.php';

$pet_ID = $_GET['pet_ID'];
$Name = $_POST['Name'];
$Age = $_POST['Age'];
$Species = $_POST['Species'];
$Breed = $_POST['Breed'];
$Gender = $_POST['Gender'];
$Weight = $_POST['Weight'];
$Height = $_POST['Height'];
$Availability = $_POST['Availability'];
$Description = $_POST['Description'];

$sql = "UPDATE pet_details SET 
        Name = '$Name', 
        Age = '$Age', 
        Species = '$Species', 
        Breed = '$Breed', 
        Gender = '$Gender', 
        Weight = '$Weight', 
        Height = '$Height', 
        Availability = '$Availability', 
        Description = '$Description'
        WHERE pet_ID = '$pet_ID'";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Pet details updated successfully!'); window.location.href='../php/admin_pet_page.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>