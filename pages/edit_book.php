<?php
session_start();
include_once "../includes/conn.php";

// Проверяем, является ли пользователь администратором
if ($_SESSION['user_type'] != 'Admin') {
    echo "You do not have permission to access this page.";
    exit();
}

// Проверяем, был ли отправлен запрос на редактирование
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $bookId = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $category = $_POST['category'];

    // Обновляем информацию о книге
    $updateQuery = "UPDATE Books SET Title = '$title', Author = '$author', Publisher = '$publisher', Language = '$language', Category = '$category' WHERE BookID = '$bookId'";
    $updateResult = $db->query($updateQuery);

    if ($updateResult) {
        // Проверяем, загружено ли новое изображение
        if ($_FILES['image']['error'] == 0) {
            // Получаем путь к изображению
            $imagePath = "../images/" . basename($_FILES["image"]["name"]);

            // Загружаем изображение
            move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

            // Обновляем путь к изображению в базе данных
            $updateImagePathQuery = "UPDATE Books SET ImagePath = '$imagePath' WHERE BookID = '$bookId'";
            $db->query($updateImagePathQuery);
        }

        $_SESSION['edit_success'] = true;
        header("Location: edit_book.php?book_id=$bookId");
        exit();
    } else {
        echo "Failed to update the book.";
    }
}

// Получаем информацию о книге для предварительного заполнения формы
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    $selectQuery = "SELECT * FROM Books WHERE BookID = '$bookId'";
    $selectResult = $db->query($selectQuery);

    if ($selectResult->num_rows > 0) {
        $row = $selectResult->fetch_assoc();
        $title = $row['Title'];
        $author = $row['Author'];
        $publisher = $row['Publisher'];
        $language = $row['Language'];
        $category = $row['Category'];
    } else {
        echo "Book not found.";
        exit();
    }
} else {
    echo "Book ID not specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "../includes/header.php";

    if (isset($_SESSION['edit_success']) && $_SESSION['edit_success']) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = document.createElement('div');
                successMessage.innerHTML = 'Changes successfully saved!';
                successMessage.className = 'alert alert-success mt-3';
                
                var messageContainer = document.querySelector('#messageContainer');
                
                if (messageContainer) {
                    messageContainer.appendChild(successMessage);
                } else {
                    document.body.appendChild(successMessage);
                }
            });
        </script>";

        // Reset the edit_success variable
        $_SESSION['edit_success'] = false;
    }

    ?>


    <div class="container mt-3 header-offset text-center">
        <div id="messageContainer"></div>
        <h2>Edit Book</h2>

        <div class="text-center edit-form  ">

            <form id="editBookForm" action="edit_book.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['Title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $row['Author']; ?>">
                </div>
                <div class="mb-3">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control input-edit" id="publisher" name="publisher" value="<?php echo $row['Publisher']; ?>">
                </div>
                <div class="mb-3">
                    <label for="language">Language:</label>
                    <select type="text" class="form-control" id="language" name="language">
                        <option value="Fiction" <?php if ($row['Language'] == 'Fiction') echo 'selected'; ?>>English</option>
                        <option value="Nonfiction" <?php if ($row['Language'] == 'Nonfiction') echo 'selected'; ?>>French</option>
                        <option value="Reference" <?php if ($row['Language'] == 'Reference') echo 'selected'; ?>>Mandarin</option>
                    </select>
                </div>
                <!-- Add more fields as needed -->
                <div class="mb-3">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                        <option value="Fiction" <?php if ($row['Category'] == 'Fiction') echo 'selected'; ?>>Fiction</option>
                        <option value="Nonfiction" <?php if ($row['Category'] == 'Nonfiction') echo 'selected'; ?>>Nonfiction</option>
                        <option value="Reference" <?php if ($row['Category'] == 'Reference') echo 'selected'; ?>>Reference</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="../images/<?php echo $row['ImagePath']; ?>" class="edit-img" alt="<?php echo $row['Title']; ?>" style="width: 150px; height: auto;">
                </div>

                <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
        <!-- ... (remaining HTML code) ... -->


    </div>

    <?php include_once "../includes/footer.php"; ?>
</body>

</html>