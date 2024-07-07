<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../style/home_style.css" rel="stylesheet" />
  <title>PAWTECHNX</title>
</head>

<body>
  <div class="banner">
    <div class="nav-bar">
      <a href="account.php" title="User Profile"><img src="../images/icon.png"></a>
      <div class="logo">
        <p>PAWTECHNX</p>
      </div>
      <ul>
        <li><a href="../php/home_page.php">Home</a></li>
        <li class="dropdown">
          <button class="dropbtn"><a href="pet_page.php">Adopt</a></button>
          <div class="dropdown-content">
            <a href="../html/cats.html">Cats</a>
            <a href="../html/hamsters.html">Hamsters</a>
            <a href="../html/dogs.html">Dogs</a>
            <a href="../html/rabbits.html">Rabbits</a>
          </div>
        </li>
        <li><a href="../php/about_us.php">About Us</a></li>
        <div class="logout">
          <li><a href="logout.php">Logout</a></li>
        </div>
      </ul>
    </div>
  </div>
  <div class="header">
    <h1>Welcome back, user!</h1>
    <p>We are very happy to see you</p>
  </div>
  <div class="wrapper">
    <div class="carousel-container">
      <h1>Meet our Featured Pets!</h1>
      <p>They are ready for a loving home.</p>
      <ul class="carousel">
        <a href="../html/cats.html">
          <li class="cat">
            <div class="pet-image">
              <img src="../images/cat/cat1.jpg" />
            </div>
            <h2>Cat</h2>
          </li>
        </a>
        <a href="../html/hamsters.html">
          <li class="hamster">
            <div class="pet-image">
              <img src="../images/hamster/hamster6.jpg" />
            </div>
            <h2>Hamster</h2>
          </li>
        </a>
        <a href="../html/dogs.html">
          <li class="dog">
            <div class="pet-image">
              <img src="../images/dog/dog6.jpg" />
            </div>
            <h2>Dog</h2>
          </li>
        </a>
        <a href="../html/rabbits.html">
          <li class="rabbit">
            <div class="pet-image">
              <img src="../images/rabbit/rabbit1.jpg" />
            </div>
            <h2>Rabbit</h2>
          </li>
        </a>
      </ul>
    </div>
    <div class="container">
      <img src="../images/cat/cat1.jpg" alt="Adopt a Pet" class="side-image">
      <div class="steps">
        <h1>How to adopt?</h1>
        <p>Here's a step-by-step guide to adopt a pet</p>
        <p class="fstep"><strong>Browse Available Pets:</strong>
          Once on the website, navigate to the section that allows you to
          browse available pets. You can usually filter the search results
          based on criteria like species, breed, age, size, and location.
        </p>
        <p class="sstep"><strong>View Pet Profiles:</strong>
          Click on the profiles of pets that interest you.
          These profiles typically include information about the pet's age,
          breed, size, temperament, medical history, and any special needs or
          requirements.
        </p>
        <p class="tstep"><strong>Submit an Application:</strong>
          If you find a pet you'd like to adopt,
          locate the adoption application form on the website. Fill out the
          required information, which may include details about your living
          situation, experience with pets, and preferences.
        </p>
        <p class="fourth-step"><strong>Wait for Approval:</strong>
          After submitting your application, wait for the
          organization to review it. They may contact you for additional
          information or to schedule a meeting with the pet.
        </p>
        <p class="fifth-step"><strong>Meet the Pet:</strong>
          If your application is approved, arrange a meeting with
          the pet either at the shelter, a foster home, or another designated
          location. Spend time interacting with the pet to see if there's a
          good match.
        </p>
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
  </div>
</body>

</html>