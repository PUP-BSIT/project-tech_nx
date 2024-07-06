<?php
include "dataconnection.php";

$sql = "SELECT user_ID, Firstname, Lastname, Contact, Email, profile_image,
        created_at FROM users";
$result = mysqli_query($conn, $sql);

$users = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         $users[] = $row;
    }
}

echo json_encode($users);

mysqli_close($conn);
?>