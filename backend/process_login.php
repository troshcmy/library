<?php

ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 2592000);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $enteredPassword = $_POST['PasswordMD5Hash']; // Assuming this is the hashed password from the form

    // Include your database connection code here if not already included
    $db = new mysqli('localhost', 'root', 'root', 'library_system');

    // Perform data validation and check credentials
    $query = "SELECT * FROM User WHERE Email = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row['PasswordHash'];

        // Verify the entered password against the stored hashed password
        if (password_verify($enteredPassword, $storedHashedPassword)) {
            $_SESSION['Member_id'] = $row['MemberID'];
            $_SESSION['user_type'] = $row['MemberType'];
            $_SESSION['expires'] = time() + 2 * 3600;

            // Set the session variables
            $_SESSION['Member_id'] = $row['MemberID'];
            $_SESSION['member_email'] = $row['Email'];
            $_SESSION['MemberType'] = $row['MemberType'];

            if ($_SESSION['user_type'] === 'Admin' || $_SESSION['user_type'] === 'Member') {
                header("Location: ../pages/admin-member-books-page.php");
                exit();
            } 
        } else {
            // Incorrect password
            $_SESSION['login_error'] = "Incorrect password. Please try again.";
            header("Location: ../pages/login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['login_error'] = "User not found. Please try again.";
        header("Location: ../pages/login.php");
        exit();
    }
    
    $stmt->close();
    $db->close();
}
?>
