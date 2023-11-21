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

    <!-- Common AJAX function -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Common AJAX function
        function sendAjaxRequest(url, successCallback, failureCallback) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText); // Log the response to the console
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

        // Handle failure function
        function handleFailure() {
            alert("An error occurred. Please try again.");
        }

        // Manage book function
        function manageBook(bookId, action) {
            var url = (action === 'borrow') ? "../backend/process_borrow.php" :
                (action === 'return') ? "../backend/process_return.php" :
                (action === 'delete') ? "../backend/process_delete_book.php" : null;
            console.log("Success!!!!!");
            if (url) {
                sendAjaxRequest(`${url}?book_id=${bookId}`, function(response) {
                    handleSuccess(response, action);

                }, handleFailure);
            }
        }

        // Handle success function
        function handleSuccess(response, action) {
            if (response.status === 'success') {
                if (action === 'borrow') {
                    alert("Book borrowed successfully!");
                } else if (action === 'return') {
                    alert("Book returned successfully!");
                } else if (action === 'delete') {
                    alert("Book deleted successfully!");
                }
                window.location.reload();
            } else {
                alert("An error occurred. Please try again.");
            }
        }

        // Edit book function
        function editBook(bookId) {
            window.location.href = "./edit_book.php?book_id=" + bookId;
        }

        // Delete book function
        function deleteBook(bookId, action) {
            if (confirm("Are you sure you want to delete this book?")) {
                // Send an AJAX request to process_delete_book.php
                sendAjaxRequest("../backend/process_delete_book.php?book_id=" + bookId, function(response) {
                    handleSuccess(response, 'delete');
                }, handleFailure);
            }
        }
    </script>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

</head>

<body>

    <?php include_once "../includes/header.php"; ?>
    <div class="container header-offset">
        <div class="row text-center mt-3">
            <div class="col-12">
                <h2>
                    <?php
                    if (isset($_SESSION['user_type'])) {
                        if ($_SESSION['user_type'] == 'Admin') {
                            echo "Hello Admin!<br>";
                            echo "<a href=\"add_book.php\" class=\"btn btn-primary books\">Add New Book</a>";
                        } elseif ($_SESSION['user_type'] == 'Member') {
                            echo "Hello Member!";
                        }
                    }
                    ?>
                </h2>

                <!-- Display list of books -->
                <div class="row">
                    <?php
                    // Loop through the result set and display book information
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-sm-12 col-md-6 col-lg-4 mb-4'>";
                        echo "<div class='card'>";
                        echo "<div class='inner-card'>";
                        echo "<img src='../images/{$row['ImagePath']}' alt='{$row['Title']}' class='card-img-top img-fluid' style='max-width: 200px; height: 350px;'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>{$row['Title']}</h5>";
                        echo "<p class='card-text'>Author: {$row['Author']}<br>Publisher: {$row['Publisher']}<br>Status: {$row['status']}</p>";
                        echo "<div class='btn-group'>";

                        // Display Borrow and Return buttons for Members
                        if ($_SESSION['user_type'] == 'Member' && $row['status'] == 'Available') {
                            echo "<button class='btn  btn-success' onclick='manageBook({$row['BookID']}, \"borrow\")'>Borrow</button>";
                        } elseif ($_SESSION['user_type'] == 'Member' && $row['status'] == 'Onloan') {
                            echo "<button class='btn return-btn btn-warning' onclick='manageBook({$row['BookID']}, \"return\")'>Return</button>";
                        }

                        // Display Return button for Admin
                        if ($_SESSION['user_type'] == 'Admin' && $row['status'] == 'Onloan') {
                            echo "<button class='btn btn-warning' onclick='manageBook({$row['BookID']}, \"return\")'>Return</button>";
                            echo "<span id='status-message-{$row['BookID']}'></span>";
                        }

                        // Display Edit and Delete buttons for Admin
                        if ($_SESSION['user_type'] == 'Admin') {
                            echo "<button class='btn btn-info' onclick='editBook({$row['BookID']})'>Edit</button>";
                            echo "<button class='btn btn-danger' onclick='deleteBook({$row['BookID']})'>Delete</button>";
                        }

                        echo "</div></div></div></div>";
                        // Close the inner-cards div
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Include footer -->
    <?php include_once "../includes/footer.php"; ?>

</body>

</html>