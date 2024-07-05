<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Homepage</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link href="../style/admin_home_style.css" rel="stylesheet" />
  </head>
  <body>
    <div class="header">
      <p class="title"><a href="home_page.html"></a>PAWTECHNX</p>
      <div class="nav">
        <a href="home_page.html">Home</a>
        <a href="#">Pets</a>
      </div>
    </div>
    <div class="container">
      <div class="tFop">
        <div class="logo">
          <h2>Admin Home Page</h2>
          <div class="close">
            <span class="material-symbols-outlined"></span>
          </div>
          <div class="sidebar-header">
            <img
              src="https://i.pinimg.com/564x/2b/00/c5/2b00c50876ac15f61dbf7f048bdf54ff.jpg"
              alt="Admin Profile"
              class="admin-profile"/>
          </div>
          <h2>Users List</h2>
          <div class="close">
            <span class="material-symbols-outlined"></span>
          </div>

          <h2>Pet List</h2>
          <div class="close">
            <span class="material-symbols-outlined"></span>
          </div>

          <h2>Adoption Progress</h2>
          <div class="close">
            <span class="material-symbols-outlined"></span>
          </div>
        </div>
        <div class="sidebar">
          <a href="#">
            <span class="material-symbols-outlined">list</span>
            <h3>Request List</h3>
          </a>
          <a href="#">
            <span class="material-symbols-outlined">playlist_add_check</span>
            <h3>Form Responses</h3>
          </a>
          <a href="#">
            <span class="material-symbols-outlined">playlist_remove</span>
            <h3>Rejected Request</h3>
          </a>
          <h2>Message/Contacts</h2>
          <div class="close">
            <span class="material-symbols-outlined"></span>
          </div>
          <h2>Pages</h2>
          <span class="material-symbols-outlined"></span>

          <a href="User Account/about_us.html">
            <span class="material-symbols-outlined">edit</span>
            <h3>About Us</h3>
          </a>
          <a href="User Account/contacts.html">
            <span class="material-symbols-outlined">edit</span>
            <h3>Contact Us</h3>
          </a>
          <a href="#">
            <span class="material-symbols-outlined">edit</span>
            <h3>Privacy Policy</h3>
          </a>
          <a href="#">
            <span class="material-symbols-outlined">edit</span>
            <h3>Address</h3>
          </a>
          <a href="#">
            <span class="material-symbols-outlined">edit</span>
            <h3>FAQ</h3>
          </a>
        </div>
      </div>
      <main>
        <h1>Monthly Recap</h1>
        <section class="monthly-recap">
          <div class="summary">
            <h2>Summary</h2>
            <p>Insert summary text and data here...</p>
          </div>
          <div class="charts">
            <!-- Insert charts or graphs here -->
          </div>
        </section>
      </main>
      <div class="users">
        <h2>New Users</h2>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../script/admin_home_script.js"></script>

    <div class="header">
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

              <tbody>
                  <tr>
                      <td>Anna</td>
                      <td>P001</td>
                      <td>07/01/24</td>
                      <td>Visit</td>
                      <td>In Progress</td>
                  </tr>
              </tbody>
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
                  <div class="form-grou buttons">
                          <button class="btn btn-success" 
                          type="submit">Submit</button>
                          <button class="btn btn-danger" 
                          type="submit" id="close">Close</button>
                  </div>
          </div>
      </div>
  </div>
  <script src="../script/admin_home_script.js"></script>

    <div class="footer">
      <div class="logo">
        <p>PAWTECHNX</p>
      </div>
      <div class="address">
        <h4>Address</h4>
        <p>Blk 123</p>
        <p>Lower Bicutan</p>
        <p>Taguig City</p>
      </div>
      <div class="contact">
        <h4>Contacts</h4>
        <p>0912345678</p>
        <p>1234567890</p>
        <p>email@example.com</p>
      </div>
      <div class="info">
        <h4>Information</h4>
        <p>Privacy Policy</p>
        <p>FAQ</p>
        <p>About Us</p>
      </div>
    </div>
  </body>
</html>
