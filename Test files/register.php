<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]); // Hash the password

    $sql = "INSERT INTO User (FirstName, LastName, Email, PasswordMD5Hash, MemberType) 
            VALUES ('$firstName', '$lastName', '$email', '$password', 'Member')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->query($sql);

    // Redirect the user to the dashboard page
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form id="registration-form" action="register.php" method="POST">
            <div class="form-group">
                <input type="text" name="first_name" placeholder="First Name" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" placeholder="Last Name" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.getElementById("registration-form").addEventListener("submit", function(event) {
            var password = document.getElementsByName("password")[0].value;
            var confirmPassword = document.getElementsByName("confirm_password")[0].value;

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
