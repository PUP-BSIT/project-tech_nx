<?php
include "dataconnection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $monthly_salary = $_POST['monthly_salary'];
    $pet_interest = $_POST['pet_interest'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO adoption_requests (user_id, full_name, email, contact_number, address, monthly_salary, pet_interest, reason) 
            VALUES ('{$_SESSION['user_id']}', '$full_name', '$email', '$contact_number', '$address', '$monthly_salary', '$pet_interest', '$reason')";

    if (mysqli_query($conn, $sql)) {
        echo "Adoption request submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet Adoption Form</title>
    <link rel="stylesheet" href="adoption_form.css" />
  </head>
  <body>
    <div class="banner">
      <div class="nav-bar">
        <div class="logo">
          <p>PAWTECHNX</p>
        </div>
        <ul>
          <li><a href="./home_page.php">Home</a></li>
          <li><a href="./pet_page.html">Pets</a></li>
          <li><a href="./about_us.html">About Us</a></li>
          <li><a href="./contacts.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="header">
        <h1>You are almost there!</h1>
        <p>Are you excited to meet your new friend?</p>
      </div>
    </div>

    <section class="privacy-policy">
      <h2>Privacy Policy</h2>
      <p>
        We only use your information for adoption purposes.Your data is kept
        private and secure.
      </p>
      <p>
        Contact us if you have any concerns. You can contact us using the
        Contact tab or the contact information below this page.
      </p>
      <div class="policies-title">
        <p>Collecting Information</p>
      </div>
      <div class="policies-list">
        <p>Essential Info Only: We collect only necessary information.</p>
        <p>Your Consent: We ask for your permission first.</p>
      </div>
      <div class="policies-title">
        <p>Using Information</p>
      </div>
      <div class="policies-list">
        <p>Adoption Purposes: We use your data only for adoption.</p>
        <p>Confidential: Your information stays private.</p>
      </div>
      <div class="policies-title">
        <p>How We Store It</p>
      </div>
      <div class="policies-list">
        <p>Secure Storage: We keep your information safe.</p>
        <p>Limited Time: We only keep it as long as needed.</p>
      </div>
      <div class="policies-title">
        <p>Sharing Your Data</p>
      </div>
      <div class="policies-list">
        <p>With Permission Only: We won’t share without your consent.</p>
      </div>
      <div class="policies-title">
        <p>Data Protection</p>
      </div>
      <div class="policies-list">
        <p>Secure Measures: We protect both paper and digital data.</p>
      </div>
      <div class="policies-title">
        <p>Handling Issue</p>
      </div>
      <div class="policies-list">
        <p>Notify You: We’ll tell you if there’s a data problem.</p>
      </div>
      <div class="policies-title">
        <p>Keeping You Informed</p>
      </div>
      <div class="policies-list">
        <p>Updates: We’ll keep you informed about any changes.</p>
      </div>
    </section>
    <hr />
    <div class="adoption-section">
      <h2>Adopt a Pet</h2>
      <p>
        Answering this form will be a indicator that you are ready to be a to be
        a pet owner.
      </p>
      <p>
        Keep in mind that adapting a pet comes with a
        <strong>BIG RESPONSIBILITY</strong> so decide wisely.
      </p>
    </div>

    <div class="adoption-section">
      <h2>Adoptation Form</h2>
      <form
        class="adoption-form"
        action="http://localhost/adoption_connect.php"
        method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="phone">Contact Number:</label>
        <input type="tel" id="contact_number" name="contact_number" required />

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required />

        <label for="salary">Monthly Salary?</label>
        <input type="text" id="monthly_salary" name="monthly_salary" required />

        <label for="pet">Which pet are you interested in?</label>
        <input type="text" id="pet_interest" name="pet_interest" required />

        <label for="message">Why do you want to adopt this pet?</label>
        <textarea id="reason" name="reason" rows="4" required></textarea>

        <button type="submit">Submit Application</button>
      </form>
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
    <script src="adoption_form.js"></script>
  </body>
</html>
