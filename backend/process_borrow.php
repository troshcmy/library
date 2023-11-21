<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

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
            // Check if the book is available
            $checkBookQuery = "SELECT * FROM Books WHERE BookID = ? AND status = 'Available'";
            $stmt = $db->prepare($checkBookQuery);
            $stmt->bind_param("i", $bookId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Set DueDate (21 days from now)
                $dueDate = date('Y-m-d', strtotime('+21 days'));

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

                // Send JSON response for success
                echo json_encode(['status' => 'success', 'message' => 'Book borrowed successfully.']);
                exit; // Ensure that no further code is executed after the JSON response
            } else {
                // Send JSON response for error (book not available)
                echo json_encode(['status' => 'error', 'message' => 'Book is not available for borrowing.']);
                exit; // Ensure that no further code is executed after the JSON response
            }
        } else {
            // Send JSON response for error (member not found)
            echo json_encode(['status' => 'error', 'message' => 'Member ID not found.']);
            exit; // Ensure that no further code is executed after the JSON response
        }
    } else {
        // Send JSON response for error (invalid book ID)
        echo json_encode(['status' => 'error', 'message' => 'Invalid book ID.']);
        exit; // Ensure that no further code is executed after the JSON response
    }
} else {
    // Send JSON response for error (invalid request method)
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit; // Ensure that no further code is executed after the JSON response
}

// Redirect the user
header('Location: ../pages/books.php');
exit; // Ensure that no further code is executed after the redirect
?>
