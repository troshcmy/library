<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php include_once "../includes/header.php" ?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-5">
        <h2>Sign Up</h2>
        <form id="signup-form" action="../backend/process_signup.php" method="POST">
          <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" id="first-name" name="first_name" required>
          </div>
          <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="last_name" required>
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
            <label for="retype-password">Re-type Password</label>
            <input type="password" class="form-control" id="retype-password" name="retype_password" required>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
    </div>
  </div>



  </div>

  <script src="../assets/js/signUp.js"></script>

  <?php include_once "../includes/footer.php" ?>
</body>

</html>