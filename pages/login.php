<?php
session_start(); // Start the session

if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
  unset($_SESSION['message']); // Remove the message after displaying it
}

// Check for a login error in the session
$loginError = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>

  <?php include_once "../includes/header.php" ?>

  <div class="container mt-3 login-flex ">
    <div class="row inner-wraper ">
      <div class="col-md-6 col-sm-12">
        <!-- Left section for image -->
        <div class="left-section">
          <img src="../images/extra_img/login.jpeg" style="width: 100%; height:700px;" alt="login" class="img-fluid img-signup">
        </div>
      </div>
      <div class="col-md-6 col-md-4 col-sm-12 right-section text-center">
        <!-- Right section for login form -->

        <div class="login-container text-center">
          <h2>Login</h2>
          <form action="../backend/process_login.php" method="POST" id="login-form">
            <?php
            // Display the success message if it's set
            if (isset($_SESSION['success_message'])) {
              echo "<p class='text-success'>" . $_SESSION['success_message'] . "</p>";
              unset($_SESSION['success_message']);
            }
            ?>
            <div class="form-group mb-3 mt-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="Email">
            </div>
            <div class="form-group mb-3">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="PasswordMD5Hash">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <p class="logpage-link-signup">Don't have an account? <a href="signUp.php">Sign up</a></p>
        </div>

      </div>
    </div>
  </div>
  <script src="../assets/js/login.js"></script>
  <?php include_once "../includes/footer.php" ?>
</body>

</html>