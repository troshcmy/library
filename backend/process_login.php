<?php

// Admin1992!

ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 2592000);


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = md5($_POST['PasswordMD5Hash']);

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

        if ($password === $row['PasswordMD5Hash']) {
            $_SESSION['Member_id'] = $row['MemberID'];
            $_SESSION['user_type'] = $row['MemberType'];
            $_SESSION['expires'] = time() + 2 * 3600;

            // Set the session variables
            $_SESSION['Member_id'] = $row['MemberID'];
            $_SESSION['member_email'] = $row['Email'];
            $_SESSION['MemberType'] = $row['MemberType'];

          


            if ($_SESSION['user_type'] === 'Admin' || $_SESSION['user_type'] === 'Member') {
                
                header("Location: ../pages/admin_panel.php");
            }
            exit();
        } else {
            echo "Incorrect password. Please try again.";
            echo "Email: " . $email . "<br>";
            echo "Password from form: " . $password . "<br>";
            echo "Password from database: " . $row['PasswordMD5Hash'] . "<br>";
        }
    } else {
        // User not found
        echo "User not found. Please try again.";
    }
}
