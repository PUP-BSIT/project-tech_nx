<?php
  include("dataconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/admin_request_list.css" />
  </head>
  <body>
  <div class="admin-dashboard">
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
          <h2>WELCOME, ADMIN!</h2>
          <img src="https://i.pinimg.com/564x/2b/00/c5/2b00c50876ac15f61dbf7f048bdf54ff.jpg" 
            alt="Admin Profile" class="admin-profile">
        </div>
        <nav>
          <ul>
            <li><a href="../html/admin_user_list.html">USERS LIST</a></li>
            <li><a href="../html/admin_pet_page.html">PET LIST</a></li>
            <li>ADOPTION PROGRESS
              <ul>
                <li class="active">
                  <a href="../php/admin_request_list.php">
                    REQUEST LIST
                  </a>
              </li>
              </ul>
            </li>
          </ul>
        </nav>
        </aside>
        <div class="main-content">
          <header class="header">
            <div class="header-left">
              <div class="hamburger-menu" id="hamburgerMenu">
                &#9776;
              </div>
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
          <th>Id no.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact Number</th>
          <th>Address</th>
          <th>Monthly Salary</th>
          <th>Pet Name</th>
          <th>Reason to Adopt</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $query = "SELECT * FROM adoption_form WHERE status = 'pending'
            ORDER BY adoption_ID ASC";
          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <th scope="row"><?php echo $row['adoption_ID']; ?></th>
          <td><?php echo $row['full_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['contact_number']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['monthly_salary']; ?></td>
          <td><?php echo $row['pet_interest']; ?></td>
          <td><?php echo $row['Reason']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td>
            <form action="admin_request_list.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
              <input type="submit" name="approve" value="approve"> &nbsp &nbsp
              <input type="submit" name="delete" value="delete"> 
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
</table>

<?php
  if(isset($_POST['approve'])) {
    $id = $_POST['id'];
    $update_query = "UPDATE adoption_form SET status = 'approved' WHERE adoption_ID = '$id'";
    mysqli_query($conn, $update_query);
    header("location: admin_request_list.php");
  }
  
  if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_query = "DELETE FROM adoption_form WHERE adoption_ID = '$id'";
    mysqli_query($conn, $delete_query);
    header("location: admin_request_list.php");
  }
?>

<h1>Approved List</h1>
<table class="approved-tbl">
  <thead>
    <tr>
    <th>Id no.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact Number</th>
          <th>Address</th>
          <th>Monthly Salary</th>
          <th>Pet Name</th>
          <th>Reason to Adopt</th>
          <th>Status</th>
          <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * FROM adoption_form WHERE status = 'pending' ORDER BY adoption_ID ASC";
$result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)) { ?>
      <tr>
      <th scope="row"><?php echo $row['adoption_ID']; ?></th>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contact_number']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['monthly_salary']; ?></td>
            <td><?php echo $row['pet_interest']; ?></td>
            <td><?php echo $row['Reason']; ?> </td>
            <td><?php echo $row['status']; ?></td>
      </tr>
  </tbody>
  <?php } ?>
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
