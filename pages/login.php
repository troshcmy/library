<?php
session_start(); // Start the session  /// Admin1992! 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php include_once "../includes/header.php" ?>

  <div class="container">

    <div class="container mt-3">
      <h2>Stacked form</h2>
      <form action="../backend/process_login.php" method="POST" id="login-form">
        <div class="mb-3 mt-3">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="Email">
        </div>
        <div class="mb-3">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="PasswordMD5Hash">
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <p>Don't have an account? <a href="signUp.php">Sign up</a></p>
    </div>
 

  </div>
  <script src="../assets/js/login.js"></script>
  <?php include_once "../includes/footer.php" ?>
</body>

</html>