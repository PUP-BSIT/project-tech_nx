<?php
include "dataconnection.php";

function emailExists($conn, $email) {
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT user_id FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);

    return ($result && mysqli_num_rows($result) > 0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm'];

    if (empty($fname) || empty($lname) || empty($contact) || empty($email) 
      || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
        exit();
    }

    if (emailExists($conn, $email)) {
        echo "Email already exists. Please use a different email.";
        exit();
    }

    if ($password !== $confirm_password) {
        echo "Password and confirm password do not match.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $hashed_password = mysqli_real_escape_string($conn, $hashed_password);

    $sql = "INSERT INTO users (Firstname, Lastname, Contact, Email, Password) 
            VALUES ('$fname', '$lname', '$contact', '$email', 
              '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="../style/registration.css" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
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
    <!--<div class="image-container">
      <img
        src="https://s3-alpha-sig.figma.com/img/0e01/5e3a/c73b5846f7ac4b5aa450d2355cfb9e06?Expires=1718582400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=dxHRCG5s4mVjVW3yvy7FBc-Vn7Lweb4pN1ZWL-J4HpjMSyzFabzzMHXNHbkNdQMXn1cuF72pCN1j~HqNTrgrePlLaXuFoXjIHdu2SF355c89L3966Np1YoYeTbHDMrD3i7W4LJFnPOKfU1vUG~90Vv59a-vAIhPiIxuPA3qJd2EAjMlrpIZ6VyaUJBJE7~AJu3sRSCo-UCHqKDCgNtVIU8ktSmnVVQTvxETNK~56i3csPRj4PJoTQ49qBKpf1XksDq~ioDPJxYfc21uFRw94Zi8WAKkEgv3PxcLJEHNBqpm7wHvV5hlnZa6iTgpnJqGjSyL6fhSAHdKPZkUVQpF-Ag__"
        alt="Decorative Image"/>
    </div>-->
    <div class="wrapper">
      <div class="form-register">
        <h2>Registration</h2>
        <form action="./registration.php" method="POST">
          <div class="input-box">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" required />
          </div>
          <div class="input-box">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" required />
          </div>
          <div class="input-box">
            <label for="contact">Number</label>
            <input type="tel" name="contact" id="contact" required />
          </div>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required />
          </div>
          <div class="input-box">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
          </div>
          <div class="input-box">
            <label for="confirm">Confirm Password</label>
            <input type="password" name="confirm" id="confirm" required />
          </div>
          <button
            type="submit"
            class="btn"
            name="submit"
            onclick="submitUser()">
            Register
          </button>
          <div class="login-register">
            <p>Already have an account? <a href="Login.html">Login</a></p>
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
    <script src="registration.js"></script>
  </body>
</html>