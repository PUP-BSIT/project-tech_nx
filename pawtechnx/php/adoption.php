<?php
include "dataconnection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT user_id, username, Firstname, Lastname, Email, Address, Monthly_Salary, contact_number FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['Firstname'];
    $lname = $row['Lastname'];
    $address = $row['Address'];
    $salary = $row['Monthly_Salary'];
    $email = $row['Email'];
    $contact_number = $row['contact_number'];
} else {
    echo "Error: Unable to fetch user information.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Form</title>
    <link rel="stylesheet" href="adoption_form.css">
</head>
<body>
    <div class="banner">
    </div>

    <section class="privacy-policy">
    </section>
    <hr />

    <div class="adoption-section">
        <h2>Adopt a Pet</h2>
    </div>

    <div class="adoption-section">
        <h2>Adoption Form</h2>
        <form class="adoption-form" action="adoption_connect.php" method="post">
            <label for="fname">Firstname:</label>
            <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>" required />

            <label for="lname">Lastname:</label>
            <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname); ?>" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required />

            <label for="contact_number">Contact Number:</label>
            <input type="tel" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" required />

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required />

            <label for="monthly_salary">Monthly Salary:</label>
            <input type="text" id="monthly_salary" name="monthly_salary" value="<?php echo htmlspecialchars($salary); ?>" required />

            <label for="pet_interest">Which pet are you interested in?</label>
            <input type="text" id="pet_interest" name="pet_interest" value="" required />

            <label for="reason">Why do you want to adopt this pet?</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>

            <button type="submit">Submit Application</button>
        </form>
    </div>

    <div class="footer-container">
        <!-- Footer content -->
    </div>
    <script src="adoption.js"></script>
</body>
</html>
