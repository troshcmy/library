<?php
session_start();
$conn = new mysqli('localhost', 'root', 'root', 'library_system');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim(mysqli_real_escape_string($conn, $_POST['first-name']));
    $lastName = trim(mysqli_real_escape_string($conn, $_POST['last-name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $confirmPassword = trim(mysqli_real_escape_string($conn, $_POST['confirm-password']));

    // Validate input
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error_message'] = 'Please fill in all fields.';
        header('Location: ../pages/signUp.php');
        exit;
    }

    if ($password != $confirmPassword) {
        $_SESSION['error_message'] = 'Passwords do not match.';
        header('Location: ../pages/signUp.php');
        exit;
    }

    // Check if email already exists
    $user_check_query = "SELECT * FROM User WHERE Email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['error_message'] = 'Email already exists.';
        header('Location: ../pages/signUp.php');
        exit;
    }

    // Encrypt the password
    $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

    // Define the insert query
    $query = "INSERT INTO User (FirstName, LastName, Email, PasswordHash) VALUES ('$firstName', '$lastName', '$email', '$password_encrypted')";


  
    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = 'Registration successful. Please log in.';
        header('Location: ../pages/login.php');
        exit;
    }
}
?>
