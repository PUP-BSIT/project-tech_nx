<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="../style/dashboard_style.css" rel="stylesheet">
</head>
<body>
    <div class="admin-dashboard">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>WELCOME, ADMIN!</h2>
                <img src="https://i.pinimg.com/564x/2b/00/c5/2b00c50876ac15f61dbf7f048bdf54ff.jpg" alt="Admin Profile" class="admin-profile">
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="./dashboard.php">HOME</a></li>
                    <li>
                      <a href="./user_list.php">USERS LIST</a>
                    </li>
                    <li><a href="./admin_pet_page.php">PET LIST</a></li>
                    <li>
                        ADOPTION PROGRESS
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
                    <div class="hamburger-menu" id="hamburgerMenu">&#9776;</div>
                    <div class="logo">PAWTECHNX</div>
                </div>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search">
                </div>
                <div class="header-icons">
                    <a href="../php/index.php">Home</a>
                </div>
            </header>

            <div class="chart-container">
                <h2>Adoption Statistics per Month</h2>
                <canvas id="adoptedSpeciesChart" width="400" height="200"></canvas>
                <div class="view-more-link">
                    <a href="../html/chart.html">View more charts</a>
                </div>
            </div>

            <div class="schedule-container">
                <h2>Scheduled Meeting:</h2>
                <table id="scheduleTable">
                    <thead>
                        <tr>
                            <th>Schedule ID</th>
                            <th>Adoption ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'dataconnection.php';
                    $sql = "SELECT * FROM schedule";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['schedule_ID']}</td>
                                    <td>{$row['adoption_ID']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['date']}</td>
                                    <td>{$row['type']}</td>
                                    <td>{$row['status']}</td>
                                    <td>
                                        <a href='edit_schedule.php?schedule_ID={$row['schedule_ID']}' class='btn btn-edit'>Edit</a>
                                        <a href='delete_schedule.php?schedule_ID={$row['schedule_ID']}' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="form-container">
                <h2>Add Adoption Meeting</h2>
                <form action="add_schedule.php" method="POST">
                    <input type="hidden" id="schedule_ID" name="schedule_ID" />
                    <div class="form-group">
                        <label for="adoption_ID">Enter your Adoption Id</label>
                        <input type="text" 
                         placeholder="Enter your Adoption Id" 
                         id="adoption_ID" 
                         name="adoption_ID" 
                         class="form-control" 
                         autocomplete="adoption-id" required />
                    </div>
                    <div class="form-group">
                        <label for="name">Enter your Name</label>
                        <input type="text" placeholder="Enter your Name" 
                        id="name" name="name" 
                        class="form-control" 
                        autocomplete="name" required />
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" 
                        placeholder="Enter a Date" 
                        id="date" name="date" 
                        class="form-control" 
                        autocomplete="date" required />
                    </div>
                    <div class="form-group">
                        <label for="type">Type of Meeting</label>
                        <select id="type" name="type" 
                          class="form-control" 
                          autocomplete="type" required>
                            <option value="">Select Type</option>
                            <option value="Online">Online</option>
                            <option value="Visit">Visit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status"><b>Status</b></label>
                        <select id="status" name="status" 
                          class="form-control" 
                          autocomplete="status" required>
                            <option value="">Select Status</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Not Started">Not Started</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <button type="submit">Add Meeting</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
    </footer>

    <script src="../script/dashboard_admin.js"></script>
</body>
</html>