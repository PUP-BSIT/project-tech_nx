<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/pet_page_style.css" />
    <title>Rabbits List</title>
  </head>
  <body>
  <div class="banner" id="banner">
        <div class="nav-bar">
            <div class="logo">
                <p>PAWTECHNX</p>
            </div>
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <li class="dropdown">
                    <button class="dropbtn"><a href="../php/pet_page.php">Adopt</a></button>
                    <div class="dropdown-content">
                        <a href="../php/cats.php">Cats</a>
                        <a href="../php/hamsters.php">Hamsters</a>
                        <a href="../php/dogs.php">Dogs</a>
                        <a href="../php/rabbits.php">Rabbits</a>
                    </div>
                </li>
                <li><a href="../php/about_us.php">About Us</a></li>
                <div class="login">
                    <li><a href="../html/login.html">Log in</a></li>
                </div>
            </ul>
        </div>
    </div>
    <div class="content">
      <h3>Meet our Featured Pets!</h3>
      <p>They are ready for a loving Home.</p>
    </div>
    <div class="wrapper">
      <div class="pet-container">
        <?php
        include "dataconnection.php";

        $query = "SELECT `pet_ID`, `Name`, `Age`, `Species`, `Breed`, `Gender`, `Weight`, `Height`, `profile_img` FROM `pet_details` WHERE `Species` = 'Rabbit' ORDER BY `Name`";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                echo "<div class='pet' onclick='showDetails(" . htmlspecialchars($row['pet_ID']) . ")'>";
                echo "<img src='" . htmlspecialchars($row['profile_img']) . "' alt='Image of " . htmlspecialchars($row['Name']) . "'>";
                echo "<p>" . htmlspecialchars($row['Name']) . "</p>";
                echo "<p>" . htmlspecialchars($row['Age']) . " years old</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Error executing query: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
        ?>
      </div>
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
