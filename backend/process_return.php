<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST['BookID'];
    $memberId = $_SESSION['MemberID']; // Assuming you have stored user_id in session

    // Include your database connection code here if not already included
    $db = new mysqli('localhost', 'root', 'root', 'library_system');

    // Update the record in BookStatus
    $updateQuery = "UPDATE bookstatus SET Status = 'Available', MemberID = NULL WHERE BookID = '$bookId' AND MemberID = '$memberId'";
    $updateResult = $db->query($updateQuery);

    if ($updateResult) {
        header("Location: dashboard.php"); // Redirect to dashboard or appropriate page
        exit();
    } else {
        echo "Failed to return the book.";
    }
}
?>
