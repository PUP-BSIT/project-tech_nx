<?php
include "dataconnection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT user_id, Firstname, Lastname, Email, Address, Monthly_Salary, contact_number FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['Firstname'];
    $lname = $row['Lastname'];
    $email = $row['Email'];
    $address = $row['Address'];
    $salary = $row['Monthly_Salary'];
    $contact_number = $row['contact_number'];
} else {
    echo "Error fetching user data: " . mysqli_error($conn);
    exit();
}

$pet_id = isset($_POST['pet_id']) ? $_POST['pet_id'] : '';
$pet_name = isset($_POST['pet_name']) ? $_POST['pet_name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adoption_form.css">
    <title>Adoption Form</title>
</head>
<body>
    <div class="form-container">
        <form action="adoption_connect.php" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>" required />
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname); ?>" required />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required />
            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" name="contact" value="<?php echo htmlspecialchars($contact_number); ?>" required />
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required />
            <label for="salary">Monthly Salary:</label>
            <input type="number" id="salary" name="salary" value="<?php echo htmlspecialchars($salary); ?>" required />
            <label for="pet_interest">Who is the pet you're interested in?</label>
            <input type="text" id="pet_interest" name="pet_interest" value="<?php echo htmlspecialchars($pet_name); ?>" readonly />
            <label for="reason">Why do you want to adopt this pet?</label>
            <textarea id="reason" name="reason" required></textarea>
            <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet_id); ?>">
            <input type="submit" value="Submit" />
        </form>
    </div>
    <footer class="footer"></footer>
</body>
</html>
