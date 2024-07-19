<?php
include 'dataconnection.php';

$sql = "SELECT `user_id`, `username`, `Firstname`, `Lastname`, `Email`, `Address`, `Contact_Number`, `Source_of_Income`, `Password`, `role` FROM users";
$result = mysqli_query($conn, $sql);

$users = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
} else {
    echo "No users found.";
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../style/user_list_style.css" />
</head>
<body>
    <div class="admin-dashboard">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>WELCOME, ADMIN!</h2>
                <img src="https://i.pinimg.com/564x/2b/00/c5/2b00c50876ac15f61dbf7f048bdf54ff.jpg" alt="Admin Profile" class="admin-profile" />
            </div>
            <nav>
                <ul>
                    <li>  <a href="../php/dashboard.php">HOME </a></li>
                    <li class="active"><a href="../php/user_list.php">USERS LIST</a></li>
                    <li><a href="../html/admin_pet_page.html">PET LIST</a></li>
                    <li>
                        ADOPTION PROGRESS
                        <ul>
                            <li><a href="../html/admin_request_list.html">REQUEST LIST</a></li>

                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="main-content">
            <header class="header">
                <div class="header-left">
                    <div class="logo">PAWTECHNX</div>
                </div>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search" />
                </div>
            </header>
            <div class="content">
                <h1>Users List</h1>
                <div id="userList" class="user-list">
                    <?php if (!empty($users)) : ?>
                        <?php foreach ($users as $user) : ?>
                            <div class="user-item">
                                <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                                <p><strong>Firstname:</strong> <?php echo $user['Firstname']; ?></p>
                                <p><strong>Lastname:</strong> <?php echo $user['Lastname']; ?></p>
                                <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
                                <p><strong>Address:</strong> <?php echo $user['Address']; ?></p>
                                <p><strong>Contact Number:</strong> <?php echo $user['Contact_Number']; ?></p>
                                <p><strong>Source of Income:</strong> <?php echo $user['Source_of_Income']; ?></p>
                                <p><strong>Password:</strong> <?php echo $user['Password']; ?></p>
                                <button onclick="showEditUserForm(<?php echo $user['user_id']; ?>)">Edit</button>
                                <button onclick="deleteUser(<?php echo $user['user_id']; ?>)">Delete</button>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No users found.</p>
                    <?php endif; ?>
                </div>
            </div>
            <footer>
                <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
            </footer>
        </div>
    </div>



    <script src="../script/admin_user_list.js"></script>
</body>
</html>
