<?php
include "dataconnection.php";


$query = "SELECT `ID`, `Name`, `Age`, `Species`, `Breed`, `Gender`, `Description`, `image_path` FROM `pets`";
$result = mysqli_query($conn, $query);

$pets = array(); 

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pets[] = $row; 
    }
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Pets</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
        }
    </style>
</head>
<body>

<h2>List of Pets</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Species</th>
            <th>Breed</th>
            <th>Gender</th>
            <th>Description</th>
            <th>Profile Image</th>
        </tr>
    </thead>
    <tbody>
        <?php

        if (!empty($pets) && is_array($pets)) {
            foreach ($pets as $pet) {
                echo "<tr>";
                echo "<td>" . $pet['ID'] . "</td>";
                echo "<td>" . $pet['Name'] . "</td>";
                echo "<td>" . $pet['Age'] . "</td>";
                echo "<td>" . $pet['Species'] . "</td>";
                echo "<td>" . $pet['Breed'] . "</td>";
                echo "<td>" . $pet['Gender'] . "</td>";
                echo "<td>" . $pet['Description'] . "</td>";
                echo "<td><img src='" . $pet['image_path'] . "' alt='Profile Image'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No pets found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
