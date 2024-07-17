<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.html");
    exit();
}

include 'dataconnection.php'; 

$user_id = $_SESSION['user_id'];

$sql = "SELECT Firstname, Lastname, Email FROM users WHERE user_ID = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die('Error preparing statement: ' . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $user_id); 

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die('Error executing statement: ' . mysqli_stmt_error($stmt));
}

$user = mysqli_fetch_assoc($result);

if (!$user) {
    die('User not found');
}

mysqli_stmt_close($stmt);
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
            <div class="form">
                <div class="input-group">
                    <div class="input-field">First Name</div>
                    <div class="input-box">
                        <div class="label"><?php echo htmlspecialchars($user['Firstname']); ?></div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-field">Last Name</div>
                    <div class="input-box">
                        <div class="label"><?php echo htmlspecialchars($user['Lastname']); ?></div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-field">Email Address</div>
                    <div class="input-box">
                        <div class="label"><?php echo htmlspecialchars($user['Email']); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
