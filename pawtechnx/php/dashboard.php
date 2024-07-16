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
            <li><a href="../html/admin_user_list.html">User List</a></li>
            <li><a href="../html/pet_details_admin.html">Pet List</a></li>
            <li>
              ADOPTION PROGRESS
              <ul>
                <li><a href="../html/admin_request_list.html">Request List</a></li>
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
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Pet ID</th>
              <th>Date</th>
              <th>Type Meeting</th>
              <th>Status</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <div class="model-body">
      <h3>Add Adoption Meeting</h3>
      <div class="form-group">
        <label for="name"><b>Enter your name</b></label>
        <input type="text" placeholder="Enter your name" id="name" class="form-control" />
      </div>
      <div class="form-group">
        <label for="id"><b>Pet ID</b></label>
        <input type="text" placeholder="Enter your Pet ID" id="id" class="form-control" />
      </div>
      <div class="form-group">
        <label for="date"><b>Date</b></label>
        <input type="date" placeholder="Enter a Date" id="date" class="form-control" />
      </div>
      <div class="form-group">
        <label for="type"><b>Type of Meeting</b></label>
        <input type="text" placeholder="Enter type of meeting" id="type" class="form-control" />
      </div>
      <div class="form-group">
        <label for="status"><b>Status</b></label>
        <input type="text" placeholder="Enter your adoption status" id="status" class="form-control" />
      </div>
      <div class="form-group buttons">
        <button class="btn btn-success" type="submit" id="submit">Submit</button>
      </div>
    </div>

    <footer>
      <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
    </footer>
    <script src="../script/dashboard_admin.js"></script>
  </body>
</html>
