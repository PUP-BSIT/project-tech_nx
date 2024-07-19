<?php
include './dataconnection.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT `user_id`, `username`, `Firstname`, `Lastname`, 
                    `Email`, `Address`, `Contact_Number`, `Source_of_Income`, 
                    `Password` FROM users WHERE `user_id` = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "User not found.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $source_of_income = $_POST['source_of_income'];
        $password = $_POST['password'];

        $update_sql = "UPDATE users SET `username` = ?, `Firstname` = ?, 
        `Lastname` = ?, `Email` = ?, `Address` = ?, `Contact_Number` = ?, 
        `Source_of_Income` = ?, `Password` = ? WHERE `user_id` = ?";
        
        $update_stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "sssssssss", $username, $firstname, 
        $lastname, $email, $address, $contact_number, $source_of_income, 
        $password, $user_id);

        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: user_list.php");
            exit;
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    echo "No user ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />
    <link rel="stylesheet" href="../style/edit_user.css" />

</head>
<body>
    <div class="admin-dashboard">
        <div class="main-content">
            <header class="header">
                <div class="header-left">
                    <div class="logo">PAWTECHNX</div>
                </div>
            </header>
            <div class="content">
                <h1>Edit User</h1>
                <form id="editUserForm" method="POST" 
                onsubmit="return confirmUpdate()">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" 
                    value="<?php echo htmlspecialchars($user['username']); ?>" 
                    required />

                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" 
                    value="<?php echo htmlspecialchars($user['Firstname']); ?>" 
                    required />

                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" 
                    value="<?php echo htmlspecialchars($user['Lastname']); ?>" 
                    required />

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" 
                    value="<?php echo htmlspecialchars($user['Email']); ?>" 
                    required />

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" 
                    value="<?php echo htmlspecialchars($user['Address']); ?>"
                    required />

                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" 
                    name="contact_number" 
                    value="<?php echo htmlspecialchars($user['Contact_Number']); 
                    ?>" required />

                    <label for="source_of_income">Source of Income</label>
                    <input type="text" id="source_of_income" 
                    name="source_of_income" value="<?php 
                    echo htmlspecialchars($user['Source_of_Income']); ?>" 
                    required />

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" 
                    value="<?php echo htmlspecialchars($user['Password']); ?>" 
                    required />

                    <input type="hidden" name="user_id" 
                    value="<?php echo htmlspecialchars($user['user_id']); ?>" />
                    <button type="submit">Update User</button>
                </form>
                
            </div>
        </div>
    </div>
    <script src="../script/user_edit.js"></script>
</body>
</html>

