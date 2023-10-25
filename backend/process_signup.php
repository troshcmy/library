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
    $password = md5($_POST['password']); // Hash the password


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
            // Insert data into the database
            $insertQuery = "INSERT INTO User (MemberType, FirstName, LastName, Email, PasswordMD5Hash) VALUES (?, ?, ?, ?, ?)";

            // Use prepared statement for better security
            if ($stmt = $conn->prepare($insertQuery)) {
                $memberType = "Member"; // Set the member type here
                $stmt->bind_param("sssss", $memberType, $firstName, $lastName, $email, $password);
                if ($stmt->execute()) {
                    echo "User registration successful!";
                } else {
                    echo "User registration failed. Please try again.";
                }
                $stmt->close();
            }
        }
    }

    // Close the connection Admin1992!
    $conn->close();
}
?>
