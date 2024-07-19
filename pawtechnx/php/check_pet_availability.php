<?php
include "dataconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pet_id'])) {
    $pet_id = $_GET['pet_id'];

    $check_query = "SELECT availability FROM pet_details WHERE pet_ID = '$pet_id'";
    $check_result = mysqli_query($conn, $check_query);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $availability = $row['availability'];

        echo json_encode(['available' => ($availability == 'Available')]);
    } else {
        echo json_encode(['error' => 'Pet not found']);
    }

    mysqli_close($conn);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
