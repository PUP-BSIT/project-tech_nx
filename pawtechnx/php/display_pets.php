<?php
include "dataconnection.php";

$species_sql = "SELECT DISTINCT Species FROM pet_details";
$species_result = mysqli_query($conn, $species_sql);

if (mysqli_num_rows($species_result) > 0) {
    while ($species_row = mysqli_fetch_assoc($species_result)) {
        $species = $species_row['Species'];

        $sql = "SELECT pet_ID, Name, Age, Breed, Gender, Weight, Height, Availability, Description FROM pet_details WHERE Species = '$species'";
        $result = mysqli_query($conn, $sql);

        echo "<div class='species-table-container'>";
        echo "<h2>Species: $species</h2>";
        echo "<div class='table-container'>
                <table border='1'>
                    <thead>
                        <tr>
                          <th>Pet ID</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Breed</th>
                          <th>Gender</th>
                          <th>Weight</th>
                          <th>Height</th>
                          <th>Availability</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['pet_ID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['Breed']}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['Weight']}</td>
                        <td>{$row['Height']}</td>
                        <td>{$row['Availability']}</td>
                        <td>{$row['Description']}</td>
                        <td>
                            <form action='../php/edit_pet_form.php' method='get' style='display: inline;'>
                                <input type='hidden' name='pet_ID' value='{$row['pet_ID']}'>
                                <button type='submit'>Edit</button>
                            </form>
                            <form action='../php/delete_pet.php' method='post' class='deleteForm'>
                                <input type='hidden' name='delete' value='{$row['pet_ID']}'>
                                <button type='submit' class='deleteBtn'>Delete</button>
                            </form>
                        </td>
                      </tr>";
                $count++;
            }

            echo "</tbody></table></div>"; 

            if ($count > 5) {
                echo "<style>.table-container { max-height: 200px; overflow-y: auto; }</style>";
            }
        } else {
            echo "<tr><td colspan='10'>No pets found</td></tr>";
            echo "</tbody></table></div>"; 
        }

        echo "</div>"; 
    }
} else {
    echo "No species found";
}

mysqli_close($conn);
?>