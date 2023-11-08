<?php
ini_set('display_errors', 1);

session_start();
include_once "../includes/conn.php";

// Set the correct Content-Type header for JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['book_id'])) {
        $bookId = $_GET['book_id'];

        // Check if the book is available
        $checkBookQuery = "SELECT * FROM Books WHERE BookID = ? AND status = 'Available'";
        $stmt = $db->prepare($checkBookQuery);
        $stmt->bind_param("i", $bookId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Set book status to 'Onloan' in Books table
            $borrowQuery = "UPDATE Books SET status = 'Onloan', StatusID = 2 WHERE BookID = ?";
            $stmt = $db->prepare($borrowQuery);
            $stmt->bind_param("i", $bookId);
            $stmt->execute();

            // Calculate DueDate (30 days from now)
            $dueDate = date('Y-m-d', strtotime('+30 days'));

            // Insert a new record into BookStatus table with DueDate
            $insertBookStatusQuery = "INSERT INTO BookStatus (BookID, StatusID, Status, DueDate) VALUES (?, 2, 'Onloan', ?)";
            $stmt = $db->prepare($insertBookStatusQuery);
            $stmt->bind_param("is", $bookId, $dueDate);
            $stmt->execute();

            echo json_encode(['status' => 'success', 'message' => 'Book borrowed successfully.', 'due_date' => $dueDate]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Book is not available for borrowing.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    }
}
?>
