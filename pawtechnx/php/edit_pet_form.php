<?php
include 'dataconnection.php';

$pet_ID = $_GET['pet_ID'];

$sql = "SELECT * FROM pet_details WHERE pet_ID = '$pet_ID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $pet = mysqli_fetch_assoc($result);
} else {
    echo "No pet found with the given ID.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet Details</title>
</head>
<body>
    <h2>Edit Pet Details</h2>
    <form action="update_pet.php?pet_ID=<?php echo $pet['pet_ID']; ?>" method="post">
        <label for="Name">Name:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $pet['Name']; ?>" required><br>
        <label for="Age">Age:</label>
        <input type="number" id="Age" name="Age" value="<?php echo $pet['Age']; ?>" required><br>
        <label for="Species">Species:</label>
        <input type="text" id="Species" name="Species" value="<?php echo $pet['Species']; ?>" required><br>
        <label for="Breed">Breed:</label>
        <input type="text" id="Breed" name="Breed" value="<?php echo $pet['Breed']; ?>" required><br>
        <label for="Gender">Gender:</label>
        <input type="text" id="Gender" name="Gender" value="<?php echo $pet['Gender']; ?>" required><br>
        <label for="Weight">Weight:</label>
        <input type="number" id="Weight" name="Weight" value="<?php echo $pet['Weight']; ?>" required><br>
        <label for="Height">Height:</label>
        <input type="number" id="Height" name="Height" value="<?php echo $pet['Height']; ?>" required><br>
        <label for="Availability">Availability:</label>
        <select id="Availability" name="Availability" required>
            <option value="Available" <?php echo ($pet['Availability'] == 'Available') ? 'selected' : ''; ?>>Available</option>
            <option value="Adopted" <?php echo ($pet['Availability'] == 'Adopted') ? 'selected' : ''; ?>>Adopted</option>
        </select><br><br>
        <input type="submit" value="Update Pet">
    </form>
</body>
</html>