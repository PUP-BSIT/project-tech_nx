<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Homepage</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link href="../style/dashboard_style.css" rel="stylesheet" />
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
                <li><a href="../html/admin_user_list.html">User List</a></li>
                <li><a href="../html/pet_details_admin.html">Pet List</a></li>
                  <li>ADOPTION PROGRESS
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
                  <div class="hamburger-menu" id="hamburgerMenu">
                      &#9776;
                  </div>
                  <div class="logo">PAWTECHNX</div>
              </div>
              <div class="search-bar">
                  <input type="text" id="searchInput" placeholder="Search">
              </div>
              <div class="header-icons">
                <a href="../php/index.php">Home</a>
              </div>
          </header>
          <div class="content">
              <h1>Monthly Recap Report</h1>
              <div id="userList" class="user-list">
              </div>
          </div>
      </div>
  </div>

  <div id="userModal" class="modal">
      <div class="modal-content">
          <span class="close">&times;</span>
          <div id="modalProfileImage" class="profile-image"></div>
          <div id="modalDetails" class="user-details">
              <h2 id="modalName"></h2>
              <p><strong>Email:</strong> <span id="modalEmail">
                 </span></p>
              <p><strong>Phone:</strong> <span id="modalPhone"> 
                 </span></p>
              <p><strong>Address:</strong> <span id="modalAddress">
                 </span></p>
              <p><strong>Created At:</strong> <span id="modalCreatedAt">
                 </span></p>
          </div>
      </div>
  </div>

    <div class="header_container">
      <div class="container-fluid">
          <h1> Schedule Meeeting</h1>
      </div>
    </div>

  <div class="container">
      <div class="card">
          <div class="card-body">
              <h3>Clients</h3>
              <button class="btn btn-primary"
              id="create">Submit</button>
          </div>
      </div>
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

  <div class="container">
      <div class="model" id="create-client">
          <div class="model-body">
              <h3>Create A Schedule</h3>
                  <div class="form-group">
                      <label for=""><b>Enter your name</b>
                          <input type="text" placeholder="Enter your name" 
                          id="name" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for=""><b>Pet ID</b>
                          <input type="text" placeholder="Enter your Pet ID" 
                          id="id" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for=""><b>Date</b>
                          <input type="text" 
                          placeholder="Enter a Date" 
                          id="date" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for=""><b>Type of Meeting</b>
                          <input type="text"
                          placeholder="Enter type of meeting" id="type" 
                          class="form-control">
                  </div>
                  <div class="form-group">
                      <label for=""><b>Status</b>
                          <input type="text" 
                          placeholder="Enter your adoption status" 
                          id="status" class="form-control">
                  </div>
                  <div class="form-group buttons">
                          <button class="btn btn-success" 
                          type="submit" id="submit">Submit</button>
                          <button class="btn btn-danger" 
                          type="submit" id="close">Close</button>
                  </div>
          </div>
      </div>
  </div>

             <footer>
                <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
            </footer>
    </div>
    <script src="../script/admin_home_script.js"></script>
  </body>
</html>
