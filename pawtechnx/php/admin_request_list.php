<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once("dataconnection.php");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adoption_ID = $_POST['adoption_ID'];
    if (isset($_POST['approve'])) {
      $status = 'approved';
    } elseif (isset($_POST['reject'])) {
      $status = 'rejected';
    } elseif (isset($_POST['delete'])) {
      $query = "DELETE FROM adoption_form WHERE adoption_ID = '$adoption_ID'";
      mysqli_query($conn, $query);
      header("Location: admin_request_list.php");
      exit;
    }

    if (isset($status)) {
      $query = "UPDATE adoption_form SET status = '$status' WHERE adoption_ID = '$adoption_ID'";
      mysqli_query($conn, $query);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet" href="../style/admin_request_list.css" />
    <title>Admin Request List</title>
  </head>
  <body>
  <div class="admin-dashboard">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>WELCOME, ADMIN!</h2>
                <a href="../php/admin_account.php" >
                <img src="../images/pawtechnx_logo.png" 
                     alt="Admin Profile" class="admin-profile"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="./dashboard.php">HOME</a></li>
                    <li>
                      <a href="./user_list.php">USERS LIST</a>
                    </li>
                    <li><a href="./admin_pet_page.php">PET LIST</a></li>
                    <li>
                        <ul>
                            <li class="active">
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
          <h1>Request List</h1>
          <div>
            <table class="request-tbl">
              <thead>
                <tr>
                  <th>Adoption ID</th>
                  <th>User ID</th>
                  <th>Pet ID</th>
                  <th>Reason to Adopt</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM adoption_form WHERE status = 'pending' ORDER BY adoption_ID ASC";
                  $result = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['adoption_ID']; ?></th>
                  <td><?php echo $row['user_ID']; ?></td>
                  <td><?php echo $row['pet_ID']; ?></td>
                  <td><?php echo $row['Reason']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    <form action="admin_request_list.php" method="POST">
                      <input type="hidden" name="adoption_ID" value="<?php echo $row['adoption_ID']; ?>"/>
                      <input type="submit" name="approve" value="Approve">
                      <input type="submit" name="reject" value="Reject">
                    </form>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

            <h1>Approved List</h1>
            <table class="approved-tbl">
              <thead>
                <tr>
                  <th>Adoption ID</th>
                  <th>User ID</th>
                  <th>Pet ID</th>
                  <th>Reason to Adopt</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM adoption_form WHERE status = 'approved' ORDER BY adoption_ID ASC";
                  $result = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['adoption_ID']; ?></th>
                  <td><?php echo $row['user_ID']; ?></td>
                  <td><?php echo $row['pet_ID']; ?></td>
                  <td><?php echo $row['Reason']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    <form action="admin_request_list.php" method="POST">
                      <input type="hidden" name="adoption_ID" value="<?php echo $row['adoption_ID']; ?>"/>
                      <input type="submit" name="delete" value="Delete">
                    </form>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

            <h1>Rejected List</h1>
            <table class="rejected-tbl">
              <thead>
                <tr>
                  <th>Adoption ID</th>
                  <th>User ID</th>
                  <th>Pet ID</th>
                  <th>Reason to Adopt</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM adoption_form WHERE status = 'rejected' ORDER BY adoption_ID ASC";
                  $result = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['adoption_ID']; ?></th>
                  <td><?php echo $row['user_ID']; ?></td>
                  <td><?php echo $row['pet_ID']; ?></td>
                  <td><?php echo $row['Reason']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    <form action="admin_request_list.php" method="POST">
                      <input type="hidden" name="adoption_ID" value="<?php echo $row['adoption_ID']; ?>"/>
                      <input type="submit" name="delete" value="Delete">
                    </form>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
    </footer>
    <script src="../script/admin_request_list.js"></script>
  </body>
</html>
