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
                <a href="../php/admin_account.php">
                    <img src="../images/pawtechnx_logo.png" alt="Admin Profile" 
                        class="admin-profile"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="./dashboard.php">HOME</a></li>
                    <li>
                        <a href="./user_list.php">USERS LIST</a>
                    </li>
                    <li class="active">
                        <a href="./admin_pet_page.php">PET LIST</a>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <a href="./admin_request_list.php">
                                    REQUEST LIST
                                </a>
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
                    <input type="hidden" id="searchInput" placeholder="Search">
                </div>
                <div class="header-icons">
                </div>
            </header>
            <div class="content">
                <h1>Pet List</h1>
                <button id="addPetBtn">Add Pet</button>
                <?php include('../php/display_pets.php'); ?>
            </div>
        </div>
    </div>
    <div id="petModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add a New Pet</h2>
            <form id="petForm" action="../php/add_pet.php" method="POST" 
                enctype="multipart/form-data">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
    
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" required>
    
                <label for="species">Species:</label>
                <input type="text" id="species" name="species" required>
    
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required>
    
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" required>
    
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" required>
    
                <label for="height">Height:</label>
                <input type="number" id="height" name="height" required>
    
                <label for="availability">Availability:</label>
                <select id="availability" name="availability" required>
                  <option value="Available">Available</option>
                  <option value="Adopted">Adopted</option>
                </select>
    
                <label for="description">Description:</label>
                <textarea id="description" name="description" required>
                </textarea>
    
                <label for="profile_img">Profile Image:</label>
                <input type="file" id="profile_img" name="profile_img" 
                    accept="image/*">
    
                <label for="gallery_paths">Gallery Paths:</label>
                <input type="file" id="gallery_paths" name="gallery_paths[]" 
                     multiple accept="image/*">
    
            <input type="submit" value="Create Pet">
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 PAWTECHNX. All rights reserved.</p>
    </footer>
    <script src="../script/admin_pet_page.js"></script>
</body>

</html>