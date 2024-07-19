<?php include "dataconnection.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Homepage</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <link href="../style/dashboard_style.css" rel="stylesheet" />
  </head>
  <body>
    <div class="admin-dashboard">
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
          <h2>WELCOME, ADMIN!</h2>
          <img
            src="https://i.pinimg.com/564x/2b/00/c5/2b00c50876ac15f61dbf7f048bdf54ff.jpg"
            alt="Admin Profile"
            class="admin-profile"
          />
        </div>
        <nav>
          <ul>
            <li><a href="../php/dashboard.php">HOME </a></li>
            <li class="active">
              <a href="../php/user_list.php">USERS LIST</a>
            </li>
            <li><a href="../html/admin_pet_page.html">PET LIST</a></li>
            <li>
              ADOPTION PROGRESS
              <ul>
                <li>
                  <a href="../html/admin_request_list.html">REQUEST LIST</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </aside>
      <div class="main_content">
        <header class="header">
          <div class="header-left">
            <div class="hamburger-menu" id="hamburgerMenu">&#9776;</div>
            <div class="logo">PAWTECHNX</div>
          </div>
          <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search" />
          </div>
          <div class="header-icons">
            <a href="../php/index.php">Home</a>
          </div>
        </header>
        <div class="content">
          <h1>Monthly Recap Report</h1>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <h1>Schedule Meeting</h1>
    </div>

    <div class="container">
      <div class="table-responsive">
        <table id="scheduleTable">
          <thead>
            <tr>
              <th>Schedule Id</th>
              <th>Adoption Id</th>
              <th>Name</th>
              <th>Date</th>
              <th>Type Meeting</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
                    $sql = "SELECT schedule_ID, adoption_ID, name, date, type, 
                    status FROM schedule";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["schedule_ID"] . "</td>
                                    <td>" . $row["adoption_ID"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["date"] . "</td>
                                    <td>" . $row["type"] . "</td>
                                    <td>" . $row["status"] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No schedules found</td></tr>";
                    }
                    ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="model-body">
      <h3>Add Adoption Meeting</h3>
      <form action="add_schedule.php" method="POST">
        <input type="hidden" id="schedule_ID" name="schedule_ID" />
        <div class="form-group">
          <label for="adoption_ID"><b>Enter your Adoption Id</b></label>
          <input
            type="text"
            placeholder="Enter your Adoption Id"
            id="adoption_ID"
            name="adoption_ID"
            class="form-control"
            autocomplete="adoption-id"
          />
        </div>
        <div class="form-group">
          <label for="name"><b>Enter your Name</b></label>
          <input
            type="text"
            placeholder="Enter your Name"
            id="name"
            name="name"
            class="form-control"
            autocomplete="name"
          />
        </div>
        <div class="form-group">
          <label for="date"><b>Date</b></label>
          <input
            type="date"
            placeholder="Enter a Date"
            id="date"
            name="date"
            class="form-control"
            autocomplete="date"
          />
        </div>
        <div class="form-group">
          <label for="type"><b>Type of Meeting</b></label>
          <select
            id="type"
            name="type"
            class="form-control"
            autocomplete="type"
          >
            <option value="">Select Type</option>
            <option value="Online">Online</option>
            <option value="Visit">Visit</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status"><b>Status</b></label>
          <select
            id="status"
            name="status"
            class="form-control"
            autocomplete="status"
          >
            <option value="">Select Status</option>
            <option value="In Progress">In Progress</option>
            <option value="Not Started">Not Started</option>
          </select>
        </div>
        <div class="form-group buttons">
          <button class="btn btn-success" type="submit" id="submit">
            Submit
          </button>
        </div>
      </form>
    </div>

    <footer>
      <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
    </footer>
  </body>
</html>
