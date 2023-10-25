<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Include your database connection code here if not already included
    $db = new mysqli('localhost', 'root', 'root', 'library_system');

    // Check if book_id is set and is a valid number
    if (isset($_GET['book_id']) && is_numeric($_GET['book_id'])) {
        $bookId = $_GET['book_id'];

        // Use prepared statements to prevent SQL injection
        $deleteQuery = "DELETE FROM books WHERE BookID = ?";
        $deleteStatusQuery = "DELETE FROM bookstatus WHERE BookID = ?";

        $stmtDelete = $db->prepare($deleteQuery);
        $stmtStatusDelete = $db->prepare($deleteStatusQuery);

        if ($stmtDelete && $stmtStatusDelete) {
            // Bind the parameters
            $stmtDelete->bind_param("i", $bookId);
            $stmtStatusDelete->bind_param("i", $bookId);

            // Execute the statements
            $deleteResult = $stmtDelete->execute();
            $deleteStatusResult = $stmtStatusDelete->execute();

            // Check if deletion was successful
            if ($deleteResult && $deleteStatusResult) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to delete the book.'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Prepared statement failed.'];
        }

        // Close the statements
        $stmtDelete->close();
        $stmtStatusDelete->close();

        // Output JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}
?>
