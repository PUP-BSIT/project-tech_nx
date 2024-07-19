<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/admin_pet_page.css">
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
                    <li><a href="../php/user_list.php">USERS LIST</a></li>
                    <li class="active"><a href="../php/admin_pet_page.php">PET LIST</a></li>
                    <li>ADOPTION PROGRESS
                        <ul>
                            <li><a href="../html/admin_request_list.html">Request List</a></li>
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
                <h1>Pet List</h1>
                <button id="addPetBtn">Add Pet</button>
                <?php include('../php/display_pets.php'); ?>
            </div>
            <footer>
                <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
            </footer>
        </div>
    </div>
    <div id="petModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add a New Pet</h2>
            <form id="petForm" action="../php/add_pet.php" method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required><br><br>
                <label for="species">Species:</label>
                <input type="text" id="species" name="species" required><br><br>
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required><br><br>
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" required><br><br>
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" required><br><br>
                <label for="height">Height:</label>
                <input type="number" id="height" name="height" required><br><br>
                <label for="availability">Availability:</label>
                <select id="availability" name="availability" required>
                    <option value="Available">Available</option>
                    <option value="Adopted">Adopted</option>
                </select><br><br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea><br><br>
                <label for="profile_img">Profile Image:</label>
                <input type="file" id="profile_img" name="profile_img" accept="image/*"><br><br>
                <label for="gallery_paths">Gallery Paths:</label>
                <input type="file" id="gallery_paths" name="gallery_paths[]" multiple accept="image/*"><br><br>
                <input type="submit" value="Create Pet">
            </form>
        </div>
    </div>

    <script src="../script/admin_pet_page.js"></script>
</body>
</html>