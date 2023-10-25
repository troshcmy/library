<?php
session_start();
include_once "../includes/conn.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];

    // Assuming you have more fields to update, update them similarly

    // Check if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $imagePath = $_FILES['image']['name'];

        // Move the uploaded file to the images directory
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/$imagePath");
    } else {
        // No new image provided, use the existing image path
        $imagePath = $_POST['existing_image_path'];
    }

    // Update book details in the database
    $updateQuery = "UPDATE Books SET Title = '$title', Author = '$author', Publisher = '$publisher', ImagePath = '$imagePath' WHERE BookID = '$bookId'";
    $updateResult = $db->query($updateQuery);

    if ($updateResult) {
        header("Location: ../admin_panel.php"); // Redirect to admin panel
        exit();
    } else {
        echo "Failed to update the book.";
    }
}
?>
