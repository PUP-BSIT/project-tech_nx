<?php
include "dataconnection.php";
session_start();

// Redirect to login if user is not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.html");
    exit();
}

// Fetch user details from database
$user_id = $_SESSION['user_id'];
$query = "SELECT user_id, Firstname, Lastname, Email, Address, contact_number, Source_of_Income FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['Firstname'];
    $lname = $row['Lastname'];
    $email = $row['Email'];
    $address = $row['Address'];
    $salary = $row['Source_of_Income'];
    $contact_number = $row['contact_number'];
} else {
    echo "Error fetching user data: " . mysqli_error($conn);
    exit();
}

// Retrieve pet_id from URL
$pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : '';
$pet_name = isset($_GET['pet_name']) ? $_GET['pet_name'] : '';

if (empty($pet_id)) {
    echo "Error: pet_id is not set.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/adoption_form.css" rel="stylesheet" />
    <title>Adoption Form</title>
</head>
<body>
<div class="banner">
    <div class="nav-bar">
      <a href="account.php" title="User Profile"><img src="../images/icon.png"></a>
      <div class="logo">
        <p>PAWTECHNX</p>
      </div>
      <ul>
        <li><a href="../php/home_page.php">Home</a></li>
        <li class="dropdown">
          <button class="dropbtn"><a href="pet_page.php">Adopt</a></button>
          <div class="dropdown-content">
            <a href="../php/cats.php">Cats</a>
            <a href="../php/hamsters.php">Hamsters</a>
            <a href="../php/dogs.php">Dogs</a>
            <a href="../php/rabbits.php">Rabbits</a>
          </div>
        </li>
        <li><a href="../php/about_us.php">About Us</a></li>
        <div class="logout">
          <li><a href="logout.php">Logout</a></li>
        </div>
      </ul>
    </div>
  </div>
  <div class="header">
    <h1>You are almost there!</h1>
    <p>Are you excited to meet your new friend?</p>
  </div>
  <div class="form-container">
    <h2>PAWTECHNX PET ADOPTION FORM</h2>
    <p>Welcome to the Pet Adoption Application!</p>
    <form action="./adoption_connect.php" method="POST" id="adoptionForm">
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
      
      <label for="salary">Source of Income:</label>
      <input type="text" id="salary" name="salary" value="<?php echo htmlspecialchars($salary); ?>" required />
      
      <label for="pet_interest">Who is the pet you're interested in?</label>
      <input type="text" id="pet_interest" name="pet_interest" value="<?php echo htmlspecialchars($pet_name); ?>" readonly />
      
      <label for="reason">Why do you want to adopt this pet?</label>
      <textarea id="reason" name="reason" required></textarea>
      
      <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet_id); ?>">
      <input type="submit" value="Submit" />
    </form>
  </div>
  <footer class="footer"></footer>
  <script src="../script/adoption.js"></script>
</body>
</html>
