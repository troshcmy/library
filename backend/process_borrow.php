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

              // Set DueDate (30 days from now)
              $dueDate = date('Y-m-d', strtotime('+30 days'));


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

                // Insert record into BookStatus table
                $insertStatusQuery = "INSERT INTO BookStatus (BookID, MemberID, Status, DueDate) VALUES (?, ?, 'Onloan', ?)";
                $stmt = $db->prepare($insertStatusQuery);
                $stmt->bind_param("iss", $bookId, $member, $dueDate);
                $stmt->execute();

              

                // Debug output
                error_log("Debug information: " . json_encode(['BookId' => $bookId, 'MemberId' => $member]));

                echo json_encode(['status' => 'success', 'message' => 'Book borrowed successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Book is not available for borrowing.']);
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
