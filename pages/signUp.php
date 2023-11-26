<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <title>Sign Up</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
          <div class="error"></div>
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
              <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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
      event.preventDefault(); // Prevent the form from submitting normally

      const formData = new FormData(event.target);

      $.ajax({
        type: "POST",
        url: "../backend/process_signup.php",
        data: {
          first_name: formData.get("first_name"),
          last_name: formData.get("last_name"),
          email: formData.get("email"),
          password: formData.get("password")
        },
        cache: false,
        success: function(data) {
          try {
            const response = JSON.parse(data);

            if (response.success) {
              if (response.redirect) {
                window.location.href = response.redirect;
              } else {
                // Handle successful registration here
              }
            } else {
              if (response.error === "user_exists") {
                alert("User with this email already exists.");
              } else {
                alert("Registration failed. Please try again.");
              }
            }
          } catch (error) {
            console.error("Error parsing JSON response:", error);
            alert("An unexpected error occurred. Please try again.");
          }
        },
        error: function(xhr, status, error) {
          console.error("Ajax request error:", xhr.responseText);
          alert("An unexpected error occurred. Please try again.");
        }
      });
    });
  </script>

  <script src="../assets/js/signUp.js"></script>
  


</body>

</html>