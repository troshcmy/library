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
            } 
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please try again.";
    }

    $stmt->close();
    $db->close();
}
?>
