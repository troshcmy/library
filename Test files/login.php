<?php

// Include the config file
require_once("config.php");

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate the input
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($email == "") {
        echo "Please enter your email address.";
        exit();
    }

    if ($password == "") {
        echo "Please enter your password.";
        exit();
    }

    // Check if the user exists in the database
    $sql = "SELECT * FROM User WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "The user does not exist.";
        exit();
    }

    // Get the user's information from the database
    $row = $result->fetch_assoc();

    // Check the password
    $passwordHash = $row["PasswordMD5Hash"];
    if ($password != $passwordHash) {
        echo "The password is incorrect.";
        exit();
    }

    // Set the user's session
    $_SESSION["user_id"] = $row["UserID"];
    $_SESSION["first_name"] = $row["FirstName"];
    $_SESSION["last_name"] = $row["LastName"];

    // Redirect the user to the dashboard
    header("Location: dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<form id="login-form" action="login.php" method="POST">
<div class="form-group">
<input type="email" name="email" placeholder="Email" class="form-control" required>
</div>
<div class="form-group">
<input type="password" name="password" placeholder="Password" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</body>
</html>

