<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../style/login_style.css" rel="stylesheet" />

  <title>Login</title>
</head>

<body>
  <div class="banner">
    <div class="nav-bar">
      <div class="logo">
        <p>PAWTECHNX</p>
      </div>
      <ul>
        <li><a href="../php/landing_page.php">Home</a></li>
        <li class="dropdown">
          <button class="dropbtn">Adopt</button>
          <div class="dropdown-content">
            <a href="../html/cats.html">Cats</a>
            <a href="../html/hamsters.html">Hamsters</a>
            <a href="../html/dogs.html">Dogs</a>
            <a href="../html/rabbits.html">Rabbits</a>
          </div>
        </li>
        <li><a href="../html/about_us.html">About Us</a></li>
        <div class="login">
          <li><a href="../php/login.php">Log in</a></li>
        </div>
      </ul>
    </div>
  </div>
  <div class="wrapper">
    <div class="form-login">
      <h2>Login</h2>
      <form action="../php/login_process.php" method="POST">
        <div class="input-box">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="input-box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" /> Remember me</label>
          <a href="#">Forgot Password</a>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
        <div class="login-register">
          <p>
            Don't have an account? <a href="../html/registration.html"> Register</a>
          </p>
        </div>
        <div class="login-register">
          <p>Are you an admin? Proceed <a href="admin_login.html">here</a></p>
        </div>
      </form>
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