<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/pet_page_style.css" />
    <title>Dogs List</title>
</head>
<body>
    <div class="banner" id="banner">
        <div class="nav-bar">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                echo '<a href="account.php" title="User Profile"><img src="../images/icon.png"></a>';
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
                    echo '<button class="dropbtn">
                      <a href="./pet_page.php">Adopt</a></button>';
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
                    echo '<button class="dropbtn">
                      <a href="./pet_page.php">Adopt</a></button>';
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
    <h1>Here are our Dog!</h1>
    <p>They can't wait to meet you</p>
  </div>
    <div class="content">
        <h3>Meet our Lovely Dog!</h3>
        <p>They are ready for a loving Home.</p>
    </div>
    <div class="wrapper">
        <?php
        include "dataconnection.php";

        $query = "SELECT `pet_ID`, `Name`, `Age`, `Species`, `Breed`, `Gender`, 
                `Weight`, `Height`, `profile_img`, `Availability` 
                FROM `pet_details` WHERE `Species` = 'Dog' 
                AND `Availability` = 'Available' 
                ORDER BY `Name`";
        $query_run = mysqli_query($conn, $query);

        if ($query_run && mysqli_num_rows($query_run) > 0) {
            echo '<div class="pet-container">';
            while ($row = mysqli_fetch_assoc($query_run)) {
                $pet_ID_parts = explode('-', $row['pet_ID']);
                $formatted_pet_ID = 'PT-' . str_pad($pet_ID_parts[1], 3, '0', 
                  STR_PAD_LEFT) . '-PTX';

                echo "<div class='pet' data-pet-id='" 
                . htmlspecialchars($formatted_pet_ID) . "'
                 onclick='showDetails(\"" 
                 . htmlspecialchars($formatted_pet_ID) . "\")'>";
                echo "<img src='" . htmlspecialchars($row['profile_img']) 
                . "' alt='Image of " . htmlspecialchars($row['Name']) . "'>";
                echo "<p>" . htmlspecialchars($row['Name']) . "</p>";
                echo "<p>" . htmlspecialchars($row['Age']) . " years old</p>";
                echo "</div>";
            }
            echo '</div>';
        } else {
            echo '<div class="adoption-message">All dogs are adopted!</div>';
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
            <p>About us</p>
        </div>
    </div>
    <script src="../script/display_pet_details.js"></script>
</body>
</html>
