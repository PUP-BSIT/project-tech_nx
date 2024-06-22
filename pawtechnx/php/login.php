<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/dataconnection.php";
    
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    var_dump($user);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="login_style.css" rel="stylesheet" />
    <script src="login.js"></script>
    <title>Login</title>
  </head>
  <body>
    <div class="banner">
      <div class="nav-bar">
        <div class="logo">
          <p>PAWTECHNX</p>
        </div>
        <ul>
          <li><a href="./home_page.php">Home</a></li>
          <li class="dropdown">
            <button class="dropbtn">Adopt</button>
            <div class="dropdown-content">
              <a href="./cats.html">Cats</a>
              <a href="./hamsters.html">Hamsters</a>
              <a href="./dogs.html">Dogs</a>
              <a href="./rabbits.html">Rabbits</a>
            </div>
          </li>
          <li><a href="./about_us.html">About Us</a></li>
          <div class="login">
            <li><a href="./Login.html">Log in</a></li>
          </div>
        </ul>
      </div>
    </div>
    <!-- <div class="image-container">
      <img
        src="https://s3-alpha-sig.figma.com/img/0e01/5e3a/c73b5846f7ac4b5aa450d2355cfb9e06?Expires=1718582400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=dxHRCG5s4mVjVW3yvy7FBc-Vn7Lweb4pN1ZWL-J4HpjMSyzFabzzMHXNHbkNdQMXn1cuF72pCN1j~HqNTrgrePlLaXuFoXjIHdu2SF355c89L3966Np1YoYeTbHDMrD3i7W4LJFnPOKfU1vUG~90Vv59a-vAIhPiIxuPA3qJd2EAjMlrpIZ6VyaUJBJE7~AJu3sRSCo-UCHqKDCgNtVIU8ktSmnVVQTvxETNK~56i3csPRj4PJoTQ49qBKpf1XksDq~ioDPJxYfc21uFRw94Zi8WAKkEgv3PxcLJEHNBqpm7wHvV5hlnZa6iTgpnJqGjSyL6fhSAHdKPZkUVQpF-Ag__"
        alt="Decorative Image"/>
    </div>-->
    <div class="wrapper">
      <div class="form-login">
        <h2>Login</h2>
        <form>
          <div class="input-box">
            <input type="email" name="email" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <input type="password" name="pass" required />
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" /> Remember me</label>
            <a href="#">Forgot Password</a>
          </div>
          <button type="submit" class="btn" name="login">Login</button>
          <div class="login-register">
            <p>
              Don't have an account? <a href="registration.html"> Register</a>
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