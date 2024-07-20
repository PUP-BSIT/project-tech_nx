<?php
include './dataconnection.php';

$sql = "SELECT user_id, username, Firstname, Lastname, Email, Address, 
        Contact_Number, Source_of_Income, Password, role FROM users";
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
  <link rel="stylesheet" href="../style/user_list_style.css" />
</head>

<body>
  <div class="admin-dashboard">
    <aside class="sidebar" id="sidebar">
      <div class="sidebar-header">
        <h2>WELCOME, ADMIN!</h2>
        <a href="../php/admin_account.php">
          <img src="../images/pawtechnx_logo.png" alt="Admin Profile" class="admin-profile"></a>
      </div>
      <nav>
        <ul>
          <li><a href="./dashboard.php">HOME</a></li>
          <li class="active">
            <a href="./user_list.php">USERS LIST</a>
          </li>
          <li><a href="./admin_pet_page.php">PET LIST</a></li>
          <li>
            <ul>
              <li>
                <a href="./admin_request_list.php">REQUEST LIST</a>
              </li>
            </ul>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="main_content">
      <header class="header">
        <div class="header-left">
          <div class="hamburger-menu" id="hamburgerMenu"></div>
          <div class="logo">PAWTECHNX</div>
        </div>
        <div class="search-bar">
          <input type="hidden" id="searchInput">

        </div>
        <div class="header-icons">

        </div>
      </header>
      <div class="content">
        <h1>Users List</h1>
        <div class="table-container">
          <?php if (!empty($users)) : ?>
            <table class="user-table">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Source of Income</th>
                  <th>Password</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) : ?>
                  <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['Firstname']; ?></td>
                    <td><?php echo $user['Lastname']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['Address']; ?></td>
                    <td><?php echo $user['Contact_Number']; ?></td>
                    <td><?php echo $user['Source_of_Income']; ?></td>
                    <td><?php echo $user['Password']; ?></td>
                    <td>
                      <button onclick="window.location.href='edit_user.php?user_id=<?php
                                                                                    echo $user['user_id']; ?>'">
                        Edit
                      </button>
                      <form method="POST" action="delete_user.php" onsubmit="return confirmDelete()">
                        <input type="hidden" name="user_id" value="<?php
                                                                    echo htmlspecialchars($user['user_id']); ?>" />
                        <button type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            <p>No users found.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <footer>
        <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
      </footer>
  <script src="../script/user_edit.js"></script>
</body>

</html>