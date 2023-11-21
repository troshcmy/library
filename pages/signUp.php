<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <title>Sign Up</title>
</head>

<body>



  <?php include_once "../includes/header.php" ?>

  <div class="container mt-3 login-flex ">
    <div class="row inner-wraper ">
      <div class="col-md-6 col-sm-12">
        <!-- Left section for image -->
        <div class="left-section">
          <img src="../images/extra_img/signup.jpg" style="height:700px" alt="Your Image" class="img-fluid img-signup">
        </div>
      </div>
      <div class="col-md-6 col-md-4 col-sm-12 right-section text-center">
        <!-- Right section for signup form -->
        <div class="login-container text-center">
          <?php
          if (isset($_GET['success']) && $_GET['success'] === 'true') {
          ?>
            <div class="alert alert-success">
              Created successfully.
            </div>
          <?php
          }
          ?>
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
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "../includes/footer.php" ?>

  <script>
    document.getElementById("signup-form").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent the form from submitting in the traditional way

      var formData = new FormData(event.target);

      fetch("./backend/process_signup.php", {
          method: "POST",
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Registration successful
            alert(data.message);
          } else {
            // Registration failed
            document.getElementById("errorMessages").innerText = data.message;
          }
        })
        .catch(error => {
          console.error("Error:", error);
        });
    });
  </script>

</body>

</html>