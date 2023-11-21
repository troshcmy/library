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


        <div class="row inner-wraper ">



            <h2 class="center">Add New Book</h2>


            <form id="addBookForm" class="shadow-style" action="../backend/process_add_book.php" method="POST" enctype="multipart/form-data">
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
                        <option value="Reference">Fantasy</option>
                        <option value="Reference">Mystery</option>
                        <option value="Reference">Science Fiction</option>
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

            <?php
            // Check for success or error parameters in the URL
            $successParam = isset($_GET['success']) ? $_GET['success'] : null;
            $messageParam = isset($_GET['message']) ? urldecode($_GET['message']) : null;

            // Display alert based on success or error parameter
            if ($successParam !== null) {
                echo "<script>";
                if ($successParam === 'true') {
                    echo "alert('Book added successfully!');";
                    // Optionally, you can redirect the user to another page or perform other actions
                } else {
                    // Display error message if the book was not added
                    echo "document.getElementById('errorMessages').innerHTML = 'Error: " . $messageParam . "';";
                }
                echo "</script>";
            }
            ?>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="../assets/js/add_book_validation.js"></script>
            

        </div>
    </div>

    <?php include_once "../includes/footer.php"; ?>
</body>

</html>