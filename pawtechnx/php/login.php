<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/dataconnection.php";

    if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($mysqli, $sql);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars(mysqli_error($mysqli)));
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                echo 'Login successful! Welcome, ' . htmlspecialchars($user['email']) . '.';
                header("Location: home_page.php");
                exit;
            } else {
                echo 'Invalid email or password.';
            }
        } else {
            echo 'No user found with this email.';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Invalid email address.';
    }

    mysqli_close($mysqli);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../style/login_style.css" rel="stylesheet" />
    <script src="../script/login.js"></script>
    <title>Login</title>
  </head>
  <body>
    <div class="banner">
      <div class="nav-bar">
        <div class="logo">
          <p>PAWTECHNX</p>
        </div>
        <ul>
          <li><a href="../php/home_page.php">Home</a></li>
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
        <form action="login.php" method="POST">
          <div class="input-box">
            <input type="email" name="email" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <input type="password" name="password" required />
            <label>Password</label>
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