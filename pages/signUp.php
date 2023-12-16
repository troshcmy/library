<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <header>
    <?php

    include_once "../includes/header.php";

    ?>
  </header>
  <div class="container mt-3 login-flex">
    <div class="row inner-wraper">
      <div class="col-md-6 col-sm-12">
        <!-- Left section for image -->
        <div class="left-section">
          <img src="../images/extra_img/signup.jpg" style="height:700px" alt="Your Image" class="img-fluid img-signup">
        </div>
      </div>

      <div class="col-md-6 col-sm-12 right-section text-center">
        <!-- Right section for signup form -->
        <div class="signup-container text-center">
          <?php
          if (isset($_SESSION['error_message'])) {
            echo "<p class='text-danger'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
          }
          if (isset($_SESSION['success_message'])) {
            echo "<p class='text-success'>" . $_SESSION['success_message'] . "</p>";
            unset($_SESSION['success_message']);
            echo "<script>setTimeout(function() { window.location.href = '../pages/login.php'; }, 4000);</script>";
          }
          ?>
          <h2>Sign Up</h2>
          <form id="sign-up-form" action="../backend/process_signup.php" method="POST">
            <div class="form-group">
              <label for="first-name">First Name</label>
              <input type="text" class="form-control" id="first-name" name="first-name" required>
            </div>
            <div class="form-group">
              <label for="last-name">Last Name</label>
              <input type="text" class="form-control" id="last-name" name="last-name" required>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
              <label for="confirm-password">Confirm Password</label>
              <input type="password" class="form-control" id="confirm-password" autocomplete="new-password" name="confirm-password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <?php include_once "../includes/footer.php" ?>
  </footer>
  <script src="./signUp.js"></script>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>