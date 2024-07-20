<?php
include "dataconnection.php";
session_start();

$logged_in = isset($_SESSION['username']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/style_about_us.css" />
  <title>About Us</title>
</head>

<body>
  <div class="banner">
    <div class="nav-bar">
      <?php
      if (isset($_SESSION['user_id'])) {
        echo '<a href="account.php" title="User Profile"><img src="../images/icon.png" alt="User Icon"></a>';
      }
      ?>
      <div class="logo">
        <p>PAWTECHNX</p>
      </div>
      <ul>
        <?php
        if ($logged_in) {
          echo '<li><a href="home_page.php">Home</a></li>';
        } else {
          echo '<li><a href="../../index.php">Home</a></li>';
        }
        ?>
        <li class="dropdown">
          <button class="dropbtn"><a href="./pet_page.php">Adopt</a></button>
          <div class="dropdown-content">
            <a href="../php/cat.php">Cats</a>
            <a href="../php/hamster.php">Hamsters</a>
            <a href="../php/dog.php">Dogs</a>
            <a href="../php/rabbit.php">Rabbits</a>
          </div>
        </li>
        <li><a href="../php/about_us.php">About Us</a></li>
        <?php
        if ($logged_in) {
          echo '<li><a href="logout.php">Logout</a></li>';
        } else {
          echo '<li><a href="../html/login.html">Login</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="us">
      <div class="about">
        <div class="content">
          <h1>ABOUT US</h1>
          <p>
            PAWTECHNX is a nonprofit team whose mission is to help homeless
            dogs, hamsters, birds, rabbits, and cats in the poorest communities
            of Taguig City with food, shelter, medical care, adoption, and
            humane treatment. PAWTECHNX also offers to rehome the animals
            that we rescue for their better life.
          </p>

          <p>
            Founded in 2024 by Alona Pepito, Precious Pasion, Sofia Barrantes,
            Eliza Alimasa ,and Mikaella Tayoto after the five found a team
            where hundreds of animals were waiting to be euthanized by
            electrocution. Unable to erase the images of the suffering animals
            from their minds, the five members have dedicated their lives to
            working with the Taguig Government, community partners, and
            volunteers to improve the plight of homeless dogs, birds, hamsters,
            rabbits, and cats in the poorest communities of Taguig. As a
            result of their tireless efforts, thousands of homeless animals
            have been rescued, sheltered, rehabilitated, and are ready to meet
            their soon loving families.
          </p>

          <p>
            PAWTECHNX financially sponsors other organizations providing free
            spay-neuter clinics, animal rescue, rehabilitation, medical care,
            and humane treatment and care to homeless animals in Taguig City.
          </p>
        </div>
        <div class="vision">
          <h3>VISION</h3>
          <p>
            PAWTECHNX is a credible non-profit team, composed of a network of
            committed, compassionate, and trustworthy individuals and
            institutions that initiate and lead in the promotion of animal
            welfare, and the protection of animals. PAWTECHNX envisions a
            nation that respects animals, practices responsible pet ownership,
            and protects wildlife.
          </p>
        </div>
        <div class="mission">
          <h3>MISSION</h3>
          <p>
            PAWTECHNX exists to prevent cruelty, pain, fear, and suffering in
            animals and to promote a society based on humane principles.
          </p>
        </div>
        <div class="values">
          <h3>OUR VALUES</h3>
          <ul>
            <div class="bullet">
              <li>Compassion and respect for animals</li>
            </div>
            <div class="bullet">
              <li>Commitment to the vision and mission of PAWTECHNX</li>
            </div>
            <div class="bullet">
              <li>Dedication to the assigned role in the team</li>
            </div>
            <div class="bullet">
              <li>Respectful conduct towards each other regardless of position</li>
            </div>
            <div class="bullet">
              <li>Honesty and trustworthiness</li>
            </div>
            <div class="bullet">
              <li>Integrity</li>
            </div>
            <div class="bullet">
              <li>Discipline (standards; compliance to organization’s rules, policies, and standards)</li>
            </div>
            <div class="bullet">
              <li>Loyalty to the team</li>
            </div>
          </ul>
        </div>


        <div class="goals">
          <h3>OUR GOALS</h3>
          <ul>
            <div class="bullet">
              <li>
                To work with the public to care for and provide shelter to
                stray and abandoned animals in Taguig;
              </li>
            </div>

            <div class="bullet">
              <li>
                To provide the highest level of care to every animal and
                immediate veterinary to treat sick or injured cats and dogs;
              </li>
            </div>

            <div class="bullet">
              <li>To reduce pet overpopulation and suffering;</li>
            </div>

            <div class="bullet">
              <li>
                To promote humane treatment, compassion, and respect for all
                animals.
              </li>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>

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