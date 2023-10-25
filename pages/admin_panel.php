    <?php
    session_start();
    include_once "../includes/conn.php"; // Include your database connection file

    // Fetch books from the database
    $query = "SELECT BookID, Title, Author, Publisher, ImagePath, status FROM Books";
    $result = $db->query($query);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- Common AJAX function -->
        <script src="../assets/js/admin_functions.js"></script>
        <script>
            function sendAjaxRequest(url, successCallback, failureCallback) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        successCallback(response);
                    } else {
                        console.error("Error: " + xhr.status + ", " + xhr.statusText);
                        failureCallback();
                    }
                }
            };
            xhr.send();
        }

        function handleSuccess(response) {
            if (response.status === 'success') {
                window.location.reload();
            } else {
                alert(response.message);
            }
        }

        function handleFailure() {
            alert("An error occurred. Please try again.");
        }
        </script>
        

        <!-- Your specific AJAX functions -->
        <script>
        function borrowBook(bookId) {
            sendAjaxRequest("../backend/process_borrow.php?book_id=" + bookId, handleSuccess, handleFailure);
        }

        function returnBook(bookId) {
            sendAjaxRequest("../backend/process_return.php?book_id=" + bookId, handleSuccess, handleFailure);
        }

        function editBook(bookId) {
            window.location.href = "./edit_book.php?book_id=" + bookId;
        }

        function deleteBook(bookId) {
            if (confirm("Are you sure you want to delete this book?")) {
                // Send an AJAX request to delete_book.php
                sendAjaxRequest("../backend/process_delete_book.php?book_id=" + bookId, handleSuccess, handleFailure);
            }
        }
        </script>
    </head>
    <body>
        <?php include_once "../includes/header.php"; ?>

        <div class="container mt-3">
            <h2>Admin Panel</h2>
            <?php
            // Check if the user is an admin
            if ($_SESSION['user_type'] == 'Admin') {
                // Display admin-specific functions
                echo "<a href=\"add_book.php\" class=\"btn btn-primary\">Add New Book</a>";

                // Display list of books
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>BookID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['BookID']}</td>
                            <td>{$row['Title']}</td>
                            <td>{$row['Author']}</td>
                            <td>{$row['Publisher']}</td>
                            <td><img src='../images/{$row['ImagePath']}' alt='{$row['Title']}' style='width: 150px; height: auto;'></td>
                            <td>{$row['status']}</td>
                            <td>
                                <button class='btn btn-success' onclick='borrowBook({$row['BookID']})'>Borrow</button>
                                <button class='btn btn-warning' onclick='returnBook({$row['BookID']})'>Return</button>
                                <button class='btn btn-info' onclick='editBook({$row['BookID']})'>Edit</button>
                                <button class='btn btn-danger' onclick='deleteBook({$row['BookID']})'>Delete</button>
                            </td>
                        </tr>";
                }

                echo "</tbody></table>";

            } else {
                echo "You do not have permission to access this page.";
            }
            ?>
        </div>

        <?php include_once "../includes/footer.php"; ?>
    </body>
    </html>
