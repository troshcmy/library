<?php
ini_set('display_errors', 1);

session_start();
include_once "../includes/conn.php";

// Set the correct Content-Type header for JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['book_id']) && is_numeric($_GET['book_id'])) {
        $bookId = $_GET['book_id'];

        // Get member ID from session
        $member = isset($_SESSION['Member_id']) ? $_SESSION['Member_id'] : null;

        if ($member !== null) {
            // Check if the book is on loan
            $checkBookQuery = "SELECT * FROM BookStatus WHERE BookID = ? AND MemberID = ? AND Status = 'Onloan'";
            $stmt = $db->prepare($checkBookQuery);
            $stmt->bind_param("ii", $bookId, $member);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Update book status to 'Available' in Books table
                $returnQuery = "UPDATE Books SET status = 'Available', StatusID = 1 WHERE BookID = ?";
                $stmt = $db->prepare($returnQuery);
                $stmt->bind_param("i", $bookId);
                $stmt->execute();

                // Update record in BookStatus table to 'Returned'
                $updateStatusQuery = "UPDATE BookStatus SET Status = 'Returned' WHERE BookID = ? AND MemberID = ?";
                $stmt = $db->prepare($updateStatusQuery);
                $stmt->bind_param("ii", $bookId, $member);
                $stmt->execute();

                // Debug output
                error_log("Debug information: " . json_encode(['BookId' => $bookId, 'MemberId' => $member]));

                echo json_encode(['status' => 'success', 'message' => 'Book returned successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Book is not on loan for the current member.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Member ID not found.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid book ID.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

?>