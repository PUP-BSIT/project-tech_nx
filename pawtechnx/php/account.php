<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.html");
    exit();
}

include 'dataconnection.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $source_of_income = $_POST['source_of_income'];
    $password = $_POST['password'];

    $update_sql = "UPDATE users SET username='$username', Firstname='$firstname'
     , Lastname='$lastname', Email='$email', Address='$address', 
       Contact_Number='$contact_number', Source_of_Income='$source_of_income', 
       Password='$password' WHERE user_ID='$user_id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

$sql = "SELECT username, Firstname, Lastname, Email, Address, Contact_Number, 
  Source_of_Income, Password FROM users WHERE user_ID='$user_id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

if (!$user) {
    die('User not found');
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Profile</title>
    <link rel="stylesheet" href="../style/account_style.css"> 
</head>
<body>
    <div class="banner">
        <div class="nav-bar">
            <a href="../php/account.php">A</a>
            <div class="logo">
                <p>PAWTECHNX</p>
            </div>
            <ul>
                <li><a href="../php/home_page.php">Home</a></li>
                <li class="dropdown">
                    <button class="dropbtn">Adopt</button>
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
    <div class="profile-section">
        <div class="profile-title">My Profile</div>
        <div class="profile-box">
            <form action="account.php" method="post">
                <input type="hidden" name="update_profile" value="1">
                <div class="form">
                    <div class="input-group">
                        <div class="input-field">Username</div>
                        <div class="input-box">
                            <input type="text" 
                             name="username" 
                             value="<?php echo htmlspecialchars
                              ($user['username']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">First Name</div>
                        <div class="input-box">
                            <input type="text" 
                             name="firstname" 
                             value="<?php echo htmlspecialchars
                              ($user['Firstname']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">Last Name</div>
                        <div class="input-box">
                            <input type="text" 
                             name="lastname" value="<?php echo htmlspecialchars
                             ($user['Lastname']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">Email Address</div>
                        <div class="input-box">
                            <input type="email" 
                            name="email" value="<?php 
                             echo htmlspecialchars($user['Email']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">Address</div>
                        <div class="input-box">
                            <input type="text" 
                             name="address" value="<?php echo htmlspecialchars
                             ($user['Address']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">Contact Number</div>
                        <div class="input-box">
                            <input type="text" 
                             name="contact_number" 
                             value="<?php echo htmlspecialchars
                             ($user['Contact_Number']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">Source of Income</div>
                        <div class="input-box">
                            <input type="text" 
                             name="source_of_income" 
                             value="<?php echo htmlspecialchars
                             ($user['Source_of_Income']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-field">Password</div>
                        <div class="input-box">
                            <input type="password" 
                             name="password" 
                             value="<?php echo htmlspecialchars
                             ($user['Password']); ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <button type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
