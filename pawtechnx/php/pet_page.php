<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/pet.css" />
    <title>Pet List</title>
</head>
<body>
    <div class="banner" id="banner">
        <div class="nav-bar">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                echo '<a href="account.php" title="User Profile"><img src="../images/icon.png" alt="User Icon"></a>';
            }
            ?>
            <div class="logo">
                <p>PAWTECHNX</p>
            </div>
            <ul>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="../php/home_page.php">Home</a></li>';
                    echo '<li class="dropdown">';
                    echo '<button class="dropbtn"><a href="../php/pet_page.php">Adopt</a></button>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="./cats.php">Cats</a>';
                    echo '<a href="./hamsters.php">Hamsters</a>';
                    echo '<a href="./dogs.php">Dogs</a>';
                    echo '<a href="./rabbits.php">Rabbits</a>';
                    echo '</div>';
                    echo '</li>';
                } else {
                    echo '<li><a href="../../index.php">Home</a></li>';
                    echo '<li class="dropdown">';
                    echo '<button class="dropbtn"><a href="./pet_page.php">Adopt</a></button>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="./cats.php">Cats</a>';
                    echo '<a href="./hamsters.php">Hamsters</a>';
                    echo '<a href="./dogs.php">Dogs</a>';
                    echo '<a href="./rabbits.php">Rabbits</a>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>
                <li><a href="pawtechnx/php/about_us.php">About Us</a></li>
                <div class="login">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<li><a href="./logout.php">Log out</a></li>';
                    } else {
                        echo '<li><a href="../html/login.html">Log in</a></li>';
                    }
                    ?>
                </div>
            </ul>
        </div>
    </div>
    <div class="header">
        <h1>Here are our pets!</h1>
        <p>They can't wait to meet you</p>
    </div>
    <div class="content">
        <h3>Meet our Featured Pets!</h3>
        <p>They are ready for a loving Home.</p>
    </div>
    <div class="wrapper">
        <?php
        include "dataconnection.php";
        $query = "
        SELECT * FROM `pet_details` WHERE `Availability` = 'Available' ORDER BY `Species`, `ID`
        ";

        $query_run = mysqli_query($conn, $query);

        if ($query_run && mysqli_num_rows($query_run) > 0) {
            $current_species = '';
            $pet_count = 0;
            $species_count = 0;
            $max_pets_per_species = 3;

            echo '<div class="species-container">';
            while ($row = mysqli_fetch_assoc($query_run)) {
                if ($current_species != $row['Species']) {
                    if ($current_species != '') {
                        if ($species_count >= $max_pets_per_species) {
                            echo '<a href="./' . strtolower($current_species) . '.php" class="view-more">View More</a>';
                        }
                        echo '</div>'; // Close previous species row
                    }
                    $current_species = $row['Species'];
                    $species_count = 0;
                    echo "<h3>$current_species</h3>"; // Display species title
                    echo '<div class="species-row">'; // Start new species row
                }

                if ($species_count < $max_pets_per_species) {
                    $pet_ID_parts = explode('-', $row['pet_ID']);
                    $formatted_pet_ID = 'PT-' . str_pad($pet_ID_parts[1], 3, '0', STR_PAD_LEFT) . '-PTX';

                    echo "<div class='pet' data-pet-id='" 
                    . htmlspecialchars($formatted_pet_ID) . "'
                        onclick='showDetails(\"" 
                        . htmlspecialchars($formatted_pet_ID) . "\")'>";
                    echo "<img src='" . htmlspecialchars($row['profile_img']) 
                    . "' alt='Image of " . htmlspecialchars($row['Name']) . "'>";
                    echo "<p>" . htmlspecialchars($row['Name']) . "</p>";
                    echo "<p>" . htmlspecialchars($row['Age']) . "</p>";
                    echo "</div>";
                    $species_count++;
                }
            }
            if ($species_count >= $max_pets_per_species) {
                echo '<a href="./' . strtolower($current_species) . '.php" class="view-more">View More</a>';
            }
            echo '</div>'; 
            echo '</div>'; 
        } else {
            echo '<div class="adoption-message">All pets are adopted!</div>';
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
            <p><a href="./about_us.php">About us</a></p>
        </div>
    </div>
    <script src="../script/display_pet_details.js"></script>
</body>
</html>
