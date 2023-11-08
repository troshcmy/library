<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <!-- Add your CSS file -->
</head>

<body>
    <?php include_once "../includes/header.php"; ?>

    <div class="container mt-3">
    <?php
    if (isset($_GET['success']) && $_GET['success'] === 'true') {
    ?>
        <div class="alert alert-success">
            Book added successfully.
        </div>
    <?php
    }
    ?>
        <h2>Add New Book</h2>
        
            <form id="addBookForm" action="../backend/process_add_book.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
                <div class="mb-3">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher">
                </div>
                <div class="mb-3">
                    <label for="language">Language:</label>
                    <select type="text" class="form-control" id="language" name="language">
                        <option value="Fiction">English</option>
                        <option value="Nonfiction">French</option>
                        <option value="Reference">Mandarin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                        <option value="Fiction">Fiction</option>
                        <option value="Nonfiction">Nonfiction</option>
                        <option value="Reference">Reference</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <!-- ... (other book details) -->
                <button type="submit" class="btn btn-primary" id="addBookButton">Add Book</button>
            </form>
            <div id="notification"></div> <!-- This div will display notifications -->
            <div id="errorMessages" style="color: red;"></div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="../assets/js/add_book_validation.js"></script>
            <script>
                document.getElementById("addBookForm").addEventListener("submit", function (event) {
                    event.preventDefault(); // Предотвращаем стандартную отправку формы

                    if (validateForm()) {
                        var form = event.target;
                        var formData = new FormData(form);

                        fetch("./backend/process_add_book.php", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => {
                                console.log("Response status:", response.status);
                                return response.json();
                            })
                        }          
                });
            </script>
        
    </div>

    <?php include_once "../includes/footer.php"; ?>
</body>

</html>
