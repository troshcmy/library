<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST["book_id"];
    $title = $_POST["book_title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $language = $_POST["language"];
    $category = $_POST["category"];

    $sql = "UPDATE Book SET Title='$title', Author='$author', Publisher='$publisher', Language='$language', Category='$category' 
            WHERE BookID='$bookID'";

    // Execute the query and handle success/failure
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form id="edit-book-form" action="edit_book.php" method="POST">
            <input type="hidden" name="book_id" value="BOOK_ID_TO_EDIT">
            <div class="form-group">
                <input type="text" name="book_title" placeholder="Book Title" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="author" placeholder="Author" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="publisher" placeholder="Publisher" class="form-control" required>
            </div>
            <div class="form-group">
                <select name="language" class="form-control" required>
                    <option value="English">English</option>
                    <!-- Add other language options -->
                </select>
            </div>
            <div class="form-group">
                <select name="category" class="form-control" required>
                    <option value="Fiction">Fiction</option>
                    <!-- Add other category options -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>
</html>
