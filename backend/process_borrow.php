<?php
session_start();
include_once "../includes/db.php"; // Include your database connection file

if ($_SESSION['user_type'] == 'Admin' && isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Check the current status of the book
    $query = "SELECT status FROM Books WHERE BookID = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $stmt->bind_result($status);
    $stmt->fetch();
    $stmt->close();

    // Toggle the status
    $newStatus = ($status == 'Available') ? 'Borrowed' : 'Available';

    // Update the status in the database
    $updateQuery = "UPDATE Books SET status = ? WHERE BookID = ?";
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->bind_param("si", $newStatus, $bookId);
    $updateStmt->execute();
    $updateStmt->close();

    // Redirect back to the admin panel
    header("Location: admin_panel.php");
    exit();
} else {
    echo "You do not have permission to access this page.";
}
?>
