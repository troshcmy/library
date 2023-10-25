<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["book_title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $language = $_POST["language"];
    $category = $_POST["category"];

    $sql = "INSERT INTO Book (Title, Author, Publisher, Language, Category) 
            VALUES ('$title', '$author', '$publisher', '$language', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form id="add-book-form" action="add_book.php" method="POST">
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
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
</body>
</html>
