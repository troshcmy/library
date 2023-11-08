<?php
// return book action
ini_set('display_errors', 1);

session_start();
include_once "../includes/conn.php";

// Set the correct Content-Type header for JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['book_id'])) {
        $bookId = $_GET['book_id'];

        // Check if the book is on loan
        $checkBookQuery = "SELECT * FROM Books WHERE BookID = ? AND status = 'Onloan'";
        $stmt = $db->prepare($checkBookQuery);
        $stmt->bind_param("i", $bookId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Set book status to 'Available' in Books table
            $returnQuery = "UPDATE Books SET status = 'Available', StatusID = 1 WHERE BookID = ?";
            $stmt = $db->prepare($returnQuery);
            $stmt->bind_param("i", $bookId);
            $stmt->execute();

            echo json_encode(['status' => 'success', 'message' => 'Book returned successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Book is not available for return.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    }
}
?>
