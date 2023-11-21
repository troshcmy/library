<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include your database connection file
include_once "../includes/conn.php";

// Set the correct Content-Type header for JSON
header('Content-Type: application/json');

// Set DueDate (21 days from now)
$dueDate = date('Y-m-d', strtotime('-21 days'));

// Query to get books that are overdue
$overdueBooksQuery = "SELECT BookID FROM BookStatus WHERE Status = 'Onloan' AND DueDate < ?";
$stmt = $db->prepare($overdueBooksQuery);
$stmt->bind_param("s", $dueDate);
$stmt->execute();
$result = $stmt->get_result();

// Process overdue books
while ($row = $result->fetch_assoc()) {
    $bookId = $row['BookID'];

    // Set book status to 'Available' in Books table
    $returnQuery = "UPDATE Books SET status = 'Available', StatusID = 1 WHERE BookID = ?";
    $stmt = $db->prepare($returnQuery);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();

    // Set status to 'Returned' in BookStatus table
    $updateStatusQuery = "UPDATE BookStatus SET Status = 'Returned' WHERE BookID = ?";
    $stmt = $db->prepare($updateStatusQuery);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();

    // Log the return action or perform other necessary tasks

    echo json_encode(['status' => 'success', 'message' => 'Book returned automatically.']);
}

// Close the database connection
$stmt->close();
$db->close();
?>
