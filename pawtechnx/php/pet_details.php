<?php
include "dataconnection.php";
session_start();

$pet_id = $_GET['pet_id']; 

$query = "SELECT * FROM pets WHERE pet_ID = '$pet_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $pet = mysqli_fetch_assoc($result);
} else {
    echo "Error: Unable to fetch pet details.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="../style/pet_details.css">
</head>
<body>
    <div class="pet-details-section">
        <h2><?php echo htmlspecialchars($pet['Name']); ?></h2>
        <p>Age: <?php echo htmlspecialchars($pet['Age']); ?></p>
        <p>Species: <?php echo htmlspecialchars($pet['Species']); ?></p>
        <p>Breed: <?php echo htmlspecialchars($pet['Breed']); ?></p>
        <p>Gender: <?php echo htmlspecialchars($pet['Gender']); ?></p>
        <p>Weight: <?php echo htmlspecialchars($pet['Weight']); ?></p>
        <p>Height: <?php echo htmlspecialchars($pet['Height']); ?></p>
        <img src="<?php echo htmlspecialchars($pet['profile_img']); ?>" alt="Pet Image">
        <button class="adopt-button" data-pet-id="<?php echo htmlspecialchars($pet['pet_ID']); ?>" data-pet-name="<?php echo htmlspecialchars($pet['Name']); ?>">Adopt</button>
    </div>
    <script src="../script/display_pet_details.js"></script>
</body>
</html>
