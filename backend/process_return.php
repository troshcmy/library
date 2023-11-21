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

        // Check if the user is an admin
        $isAdmin = isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Admin';

        if ($member !== null || $isAdmin) {
            // Check if the book is on loan
            $checkBookQuery = "SELECT * FROM BookStatus WHERE BookID = ? AND Status = 'Onloan'";
            
            // If the user is an admin, don't check for MemberID
            if (!$isAdmin) {
                $checkBookQuery .= " AND MemberID = ?";
            }
            
            $stmt = $db->prepare($checkBookQuery);

            if (!$isAdmin) {
                $stmt->bind_param("ii", $bookId, $member);
            } else {
                $stmt->bind_param("i", $bookId);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Update book status to 'Available' in Books table
                $returnQuery = "UPDATE Books SET status = 'Available', StatusID = 1 WHERE BookID = ?";
                $stmt = $db->prepare($returnQuery);
                $stmt->bind_param("i", $bookId);
                $stmt->execute();

                // Update record in BookStatus table to 'Returned'
                $updateStatusQuery = "UPDATE BookStatus SET Status = 'Returned', DueDate = NULL WHERE BookID = ?";
                if (!$isAdmin) {
                    $updateStatusQuery .= " AND MemberID = ?";
                }
                
                $stmt = $db->prepare($updateStatusQuery);
                
                if (!$isAdmin) {
                    $stmt->bind_param("ii", $bookId, $member);
                } else {
                    $stmt->bind_param("i", $bookId);
                }

                $stmt->execute();

                // If the user is an admin, update the status in the Books table
                if ($isAdmin) {
                    $updateQuery = "UPDATE Books SET status = 'Available' WHERE BookID = ?";
                    $stmt = $db->prepare($updateQuery);
                    $stmt->bind_param("i", $bookId);
                    $stmt->execute();
                }

                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error']);
            }
        } else {
            echo json_encode(['status' => 'error']);
        }
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error']);
}
?>
