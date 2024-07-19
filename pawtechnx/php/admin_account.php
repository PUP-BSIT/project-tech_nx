<?php
session_start();
include './dataconnection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "Admin ID is not set or you do not have the required permissions. Please log in.";
    exit;
}

$admin_ID = $_SESSION['user_id'];

$sql = "SELECT admin_ID, Firstname, Lastname, Username, Password FROM admin WHERE admin_ID=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $admin_ID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$admin = mysqli_fetch_assoc($result);

if (!$admin) {
    echo "Admin not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    $update_sql = "UPDATE admin SET Username=?, Firstname=?, Lastname=?, Password=? WHERE admin_ID=?";
    $update_stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($update_stmt, "sssss", $username, $firstname, $lastname, $password, $admin_ID);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account Profile</title>
    <link rel="stylesheet" href="../style/admin_account_styles.css">
</head>
<body>
    <div class="account">
        <div class="main-container"></div>
        <div class="header">
            <div class="logo"><a href="./dashboard.php">PAWTECHNX</a></div>
        </div>
        <div class="profile-section">
            <div class="profile-title">Admin Profile</div>
            <div class="profile-image"></div>
            <div class="profile-box">
                <div class="form">
                    <form method="POST">
                        <div class="input-group">
                            <div class="input-field">First Name</div>
                            <div class="input-box">
                                <input type="text" name="firstname" value="<?php echo htmlspecialchars($admin['Firstname']); ?>" required />
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-field">Last Name</div>
                            <div class="input-box">
                                <input type="text" name="lastname" value="<?php echo htmlspecialchars($admin['Lastname']); ?>" required />
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-field">Username</div>
                            <div class="input-box">
                                <input type="text" name="username" value="<?php echo htmlspecialchars($admin['Username']); ?>" required />
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-field">Password</div>
                            <div class="input-box">
                                <input type="password" name="password" value="<?php echo htmlspecialchars($admin['Password']); ?>" required />
                            </div>
                        </div>
                        <button type="submit" name="update_profile">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>