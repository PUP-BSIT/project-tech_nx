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
    <title>Edit Pet</title>
    <link rel="stylesheet" href="../style/edit_pet_form.css">
</head>
<body>
    <h2>Edit Pet</h2>
    <form action="../php/update_pet.php?pet_ID=<?php echo $pet_ID; ?>" 
        method="POST">
    
    <label for="Name">Name:</label>
    <input type="text" id="Name" name="Name" value="<?php
          echo htmlspecialchars($pet['Name']); ?>" required>
    
    <label for="Age">Age:</label>
    <input type="number" id="Age" name="Age" value="<?php 
          echo htmlspecialchars($pet['Age']); ?>" required>
    
    <label for="Species">Species:</label>
    <input type="text" id="Species" name="Species" value="<?php 
          echo htmlspecialchars($pet['Species']); ?>" required>
    
    <label for="Breed">Breed:</label>
    <input type="text" id="Breed" name="Breed" value="<?php 
          echo htmlspecialchars($pet['Breed']); ?>" required>
    
    <label for="Gender">Gender:</label>
    <input type="text" id="Gender" name="Gender" value="<?php 
          echo htmlspecialchars($pet['Gender']); ?>" required>
    
    <label for="Weight">Weight:</label>
    <input type="number" id="Weight" name="Weight" value="<?php 
          echo htmlspecialchars($pet['Weight']); ?>" required>
    
    <label for="Height">Height:</label>
    <input type="number" id="Height" name="Height" value="<?php 
          echo htmlspecialchars($pet['Height']); ?>" required>
    
    <label for="Availability">Availability:</label>
    <select id="Availability" name="Availability" required>

        <option value="Available" <?php
            echo ($pet['Availability'] == 'Available') ? 'selected' : ''; ?>
                  >Available</option>

        <option value="Adopted" <?php
            echo ($pet['Availability'] == 'Adopted') ? 'selected' : ''; ?>
                  >Adopted</option>
    </select>
    
    <label for="Description">Description:</label>
    <textarea id="Description" name="Description" required><?php
         echo htmlspecialchars($pet['Description']); ?></textarea>
    
    <input type="submit" value="Update Pet">
</form>
</body>
</html>