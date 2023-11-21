<?php
session_start();
header('Content-Type: application/json');
// Include your database connection script


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Include your database connection code here if not already included
    $db = new mysqli('localhost', 'root', 'root', 'library_system');

    // Check if book_id is set and is a valid number
    if (isset($_GET['book_id']) && is_numeric($_GET['book_id'])) {
        $bookId = $_GET['book_id'];

        // Use prepared statements to prevent SQL injection
        $deleteQuery = "DELETE FROM books WHERE BookID = ?";
        $deleteStatusQuery = "DELETE FROM bookstatus WHERE BookID = ?";

        // Prepare and execute the queries
        $stmt = $db->prepare($deleteQuery);
        $stmt->bind_param("i", $bookId);
        $result1 = $stmt->execute();

        $stmt = $db->prepare($deleteStatusQuery);
        $stmt->bind_param("i", $bookId);
        $result2 = $stmt->execute();

        // Check if the delete operations were successful
        if ($result1 && $result2) {
            // If successful, send a JSON response with status "success"
            echo json_encode(['status' => 'success']);
        } else {
            // If not successful, send a JSON response with status "error"
            echo json_encode(['status' => 'error']);
        }
        
    }
}
