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
        <a href="../php/index.php">PAWTECHNX</a>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="form-login">
      <h2>Login</h2>
      <form action="../php/login_process.php" method="POST">
        <div class="input-box">
          <input type="text" id="username" name="username" required>
          <label for="username">Username</label>
        </div>
        <div class="input-box">
          <input type="password" id="password" name="password" required>
          <label for="password">Password</label>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
        <div class="login-register">
          <p>
            Don't have an account? <a href="../html/registration.html">Register</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>