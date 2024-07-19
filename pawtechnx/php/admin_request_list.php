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
      $query = "DELETE FROM adoption WHERE adoption_ID = '$adoption_ID'";
      mysqli_query($conn, $query);
      header("Location: admin_request_list.php");
    exit;
  }

  if (isset($status)) {
    $query = "UPDATE adoption SET status = '$status' WHERE adoption_ID = '$adoption_ID'";
    mysqli_query($conn, $query);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/admin_request_list.css" />
    <title>Admin Request List</title>
  </head>
  <body>
    <div class="admin-dashboard">
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
          <h2>WELCOME, ADMIN!</h2>
          <img src="https://i.pinimg.com/564x/2b/00/c5/2b00c50876ac15f61dbf7f048bdf54ff.jpg"
            alt="Admin Profile"
            class="admin-profile">
        </div>
        <nav>
          <ul>
            <li><a href="../html/admin_user_list.html">USERS LIST</a></li>
            <li><a href="../html/admin_pet_page.html">PET LIST</a></li>
            <li>ADOPTION PROGRESS
              <ul>
                <li class="active">
                  <a href="../php/admin_request_list.php">REQUEST LIST</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </aside>
      <div class="main-content">
        <header class="header">
          <div class="header-left">
            <div class="hamburger-menu">&#9776;</div>
            <div class="logo">PAWTECHNX</div>
          </div>
          <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search">
          </div>
          <div class="header-icons">
            <a href="../php/dashboard.php">Home</a>
          </div>
        </header>
        <div class="content">
          <h1>Request List</h1>
          <div>
            <table class="request-tbl">
              <thead>
                <tr>
                  <th>ID no.</th>
                  <th>User ID</th>
                  <th>Pet ID</th>
                  <th>Reason to Adopt</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM adoption WHERE status = 'pending' ORDER BY adoption_ID ASC";
                  $result = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['adoption_ID']; ?></th>
                  <td><?php echo $row['user_ID']; ?></td>
                  <td><?php echo $row['pet_ID']; ?></td>
                  <td><?php echo $row['reason']; ?></td>
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
                  <th>ID no.</th>
                  <th>User ID</th>
                  <th>Pet ID</th>
                  <th>Reason to Adopt</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM adoption WHERE status = 'approved' ORDER BY adoption_ID ASC";
                  $result = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['adoption_ID']; ?></th>
                  <td><?php echo $row['user_ID']; ?></td>
                  <td><?php echo $row['pet_ID']; ?></td>
                  <td><?php echo $row['reason']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

            <h1>Rejected List</h1>
            <table class="rejected-tbl">
              <thead>
                <tr>
                  <th>ID no.</th>
                  <th>User ID</th>
                  <th>Pet ID</th>
                  <th>Reason to Adopt</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM adoption WHERE status = 'rejected' ORDER BY adoption_ID ASC";
                  $result = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['adoption_ID']; ?></th>
                  <td><?php echo $row['user_ID']; ?></td>
                  <td><?php echo $row['pet_ID']; ?></td>
                  <td><?php echo $row['reason']; ?></td>
                  <td><?php echo $row['status']; ?></td>
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
  </body>
</html>
