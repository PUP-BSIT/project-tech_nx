<?php
include "dataconnection.php";

$sql = "SELECT id, name, age, species, breed, gender, profile_image, 
current_datetimestamp, updated_timestamp FROM pets";
$result = mysqli_query($conn, $sql);

$pets = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $formatted_id = 'PT-' . str_pad($row['id'], 3, '0', STR_PAD_LEFT) . '-PTX';
        
        $row['pet_ID'] = $formatted_id;
        
        unset($row['id']);
        
        $pets[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($pets);
?>
