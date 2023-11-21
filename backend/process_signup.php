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
            echo "Email address is already associated with a user.";
        } else {
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
                    echo json_encode(['success' => true, 'message' => 'User registration successful!']);
                } else {
                    // User registration failed
                    echo json_encode(['success' => false, 'message' => 'User registration failed. Please try again.']);
                }
                $stmt->close();
            }
        }
    }

    // Close the connection
    $conn->close();
}
