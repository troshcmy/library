<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "library_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Example validation: Check if email already exists
    $emailExistsQuery = "SELECT COUNT(*) FROM User WHERE Email = ?";

    // Use prepared statement for better security
    if ($stmt = $conn->prepare($emailExistsQuery)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($emailCount);
        $stmt->fetch();
        $stmt->close();

        if ($emailCount > 0) {
            // Email address is already associated with a user.
            $response = ['success' => false, 'error' => 'user_exists'];
            echo json_encode($response);
        } else {
            // Additional check for email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response = ['success' => false, 'error' => 'invalid_email'];
                echo json_encode($response);
                return;
            }
        
            // Hash the password using password_hash
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into the database
            $insertQuery = "INSERT INTO User (MemberType, FirstName, LastName, Email, PasswordHash) VALUES (?, ?, ?, ?, ?)";

            // Use prepared statement for better security
            if ($stmt = $conn->prepare($insertQuery)) {
                $memberType = "Member"; // Set the member type here
                $stmt->bind_param("sssss", $memberType, $firstName, $lastName, $email, $hashedPassword);
                if ($stmt->execute()) {
                    // User registration successful
                    $response = ['success' => true, 'message' => 'User registration successful!', 'redirect' => '../pages/login.php'];
                } else {
                    // User registration failed
                    $response = ['success' => false, 'message' => 'User registration failed. Please try again.'];
                }
                $stmt->close(); // Closing the statement here
            }

            // Close the connection
            $conn->close();

            // Convert the response array to JSON and echo it
            echo json_encode($response);
        }
    }
}
?>
