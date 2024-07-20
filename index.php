<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="pawtechnx/style/home_style.css" rel="stylesheet" />
    <title>PAWTECHNX</title>
  </head>

  <body>
    <div class="banner" id="banner">
      <div class="nav-bar">
        <div class="logo">
          <p>PAWTECHNX</p>
        </div>
        <ul>+
          <li><a href="index.php">Home</a></li>
          <li class="dropdown">
            <button class="dropbtn"><a href="pawtechnx/php/pet_page.php">Adopt</a></button>
            <div class="dropdown-content">
              <a href="pawtechnx/php/cat.php">Cats</a>
              <a href="pawtechnx/php/hamster.php">Hamsters</a>
              <a href="pawtechnx/php/dog.php">Dogs</a>
              <a href="pawtechnx/php/rabbit.php">Rabbits</a>
            </div>
          </li>
          <li><a href="pawtechnx/php/about_us.php">About Us</a></li>
          <div class="login">
            <li><a href="pawtechnx/html/login.html">Log in</a></li>
          </div>
        </ul>
      </div>
    </div>
    <div class="header">
      <h1>Rescue. Adopt. Love.</h1>
      <p>Learn how to adopt a pet today!</p>
    </div>
    <div class="wrapper" id="wrapper">
      <div class="carousel-container">
        <h1>Meet our Featured Pets!</h1>
        <p>They are ready for a loving home.</p>
        <ul class="carousel">
          <a href="pawtechnx/php/cat.php">
            <li class="cat">
              <div class="pet-image">
                <img src="pawtechnx/images/cat/cat1.jpg" />
              </div>
              <h2>Cat</h2>
            </li>
          </a>
          <a href="pawtechnx/php/hamster.php">
            <li class="hamster">
              <div class="pet-image">
                <img src="pawtechnx/images/hamster/hamster6.jpg" />
              </div>
              <h2>Hamster</h2>
            </li>
          </a>
          <a href="pawtechnx/php/dog.php">
            <li class="dog">
              <div class="pet-image">
                <img src="pawtechnx/images/dog/dog6.jpg" />
              </div>
              <h2>Dog</h2>
            </li>
          </a>
          <a href="pawtechnx/php/rabbit.php">
            <li class="rabbit">
              <div class="pet-image">
                <img src="pawtechnx/images/rabbit/rabbit1.jpg" />
              </div>
              <h2>Rabbit</h2>
            </li>
          </a>
        </ul>
      </div>
      <div class="container">
        <img
          src="pawtechnx/images/cat/cat1.jpg"
          alt="Adopt a Pet"
          class="side-image"/>
        <div class="steps" id="steps">
          <h1>How to adopt?</h1>
          <p>Here's a step-by-step guide to adopt a pet</p>
          <p class="fstep">
            <strong>Browse Available Pets:</strong>
            Once on the website, navigate to the section that allows you to
            browse available pets. You can usually filter the search results
            based on criteria like species, breed, age, size, and location.
          </p>
          <p class="sstep">
            <strong>View Pet Profiles:</strong>
            Click on the profiles of pets that interest you. These profiles
            typically include information about the pet's age, breed, size,
            temperament, medical history, and any special needs or requirements.
          </p>
          <p class="tstep">
            <strong>Submit an Application:</strong>
            If you find a pet you'd like to adopt, locate the adoption
            application form on the website. Fill out the required information,
            which may include details about your living situation, experience
            with pets, and preferences.
          </p>
          <p class="fourth-step">
            <strong>Wait for Approval:</strong>
            After submitting your application, wait for the organization to
            review it. They may contact you for additional information or to
            schedule a meeting with the pet.
          </p>
          <p class="fifth-step">
            <strong>Meet the Pet:</strong>
            If your application is approved, arrange a meeting with the pet
            either at the shelter, a foster home, or another designated
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
