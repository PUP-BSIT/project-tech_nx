<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../style/pet_page_style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PETS</title>
</head>
<body>
    <div class="banner">
        <div class="nav-bar">
            <div class="logo">
                <p>PAWTECHNX</p>
            </div>
            <ul>
                <li><a href="home_page.html">Home</a></li>
                <li><a href="pet_page.php">Pets</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contacts.html">Contact Us</a></li>
            </ul>
        </div>
        <div class="header">
            <h1>Rescue. Adopt. Love.</h1>
            <p>Finding Forever Homes for Our Furry Friends</p>
        </div>
    </div>

    <div class="content">
        <h3>Meet our Featured Pets!</h3>
        <p>They are ready for a loving Home.</p>
    </div>
    <div class="wrapper">
        <?php
        include "dataconnection.php";
        $query = "SELECT `pet_ID`, `Name`, `Age`, `Species`, `Breed`, `Gender`, `Size`, `profile_img` FROM `pet_details` ORDER BY Species";
        $query_run = mysqli_query($conn, $query);

        $current_species = null;
        if ($query_run) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                if ($row['Species'] != $current_species) {
                    if ($current_species !== null) {
                        echo '</div></div>';
                    }
                    echo '<div class="species-container">';
                    echo '<h2>' . htmlspecialchars($row['Species']) . '</h2>';
                    echo '<div class="pet-carousel">';
                    echo '<button class="carousel-button left">&lt;</button>';
                    $current_species = $row['Species'];
                }
                echo "<div class='pet' onclick='showDetails(" . htmlspecialchars($row['pet_ID']) . ")'>";
                echo "<img src='" . htmlspecialchars($row['profile_img']) . "' alt='Image of " . htmlspecialchars($row['Name']) . "'>";
                echo "<p>" . htmlspecialchars($row['Name']) . "</p>";
                echo "<p>" . htmlspecialchars($row['Age']) . " years old</p>";
                echo "</div>";
            }
            if ($current_species !== null) {
                echo '<button class="carousel-button right">&gt;</button>';
                echo '</div></div>';
            }
        } else {
            echo "<p>Error executing query: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn);
        ?>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modal-body" class="pet-details"></div>
        </div>
    </div>

    <script src="display_pet_details.js"></script>

    <div class="footer-container">
        <div class="footer-address">
            <h3>Address</h3>
            <p>123 Blk 25, Lower Bicutan, Taguig City</p>
        </div>
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>Email: contact@pawtechnx.com</p>
            <p>Phone: 09435625462</p>
        </div>
        <div class="footer-info">
            <h3>Info</h3>
            <p>Privacy Policy</p>
            <p>Terms of Service</p>
            <p>FAQ</p>
            <p>About us</p>
        </div>
    </div>
</body>
</html>
