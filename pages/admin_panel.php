<?php
session_start();

// Debug output
// echo "User ID: " . $_SESSION['member_id'] . "<br>";
// echo "User Email: " . $_SESSION['member_email'] . "<br>";
// echo "User Type: " . $_SESSION['MemberType'] . "<br>";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

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

        function manageBook(bookId, action) {
            var url = (action === 'borrow') ? "../backend/process_borrow.php" : "../backend/process_return.php";

            sendAjaxRequest(`${url}?book_id=${bookId}`, handleSuccess, handleFailure);
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
    <div class="container inner-wraper">
    <?php include_once "../includes/header.php"; ?>

    <div class="container mt-3 books">
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_type'])) {
            // Display different content based on user type
            echo "<h2>";
            if ($_SESSION['user_type'] == 'Admin') {
                echo "Admin";
                // Display admin-specific functions
                echo "<a href=\"add_book.php\" class=\"btn btn-primary\">Add New Book</a>";
            }
            echo "</h2>";

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

            // Loop through the result set and display book information
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['BookID']}</td>
                    <td>{$row['Title']}</td>
                    <td>{$row['Author']}</td>
                    <td>{$row['Publisher']}</td>
                    <td><img src='../images/{$row['ImagePath']}' alt='{$row['Title']}' style='width: 150px; height: auto;'></td>
                    <td>{$row['status']}</td>
                    
                    <td>";

                // Display Borrow and Return buttons for Members
                if ($_SESSION['user_type'] == 'Member' && $row['status'] == 'Available') {
                    echo "<button class='btn btn-success' onclick='manageBook({$row['BookID']}, \"borrow\")'>Borrow</button>";
                } elseif ($_SESSION['user_type'] == 'Member' && $row['status'] == 'Onloan') {
                    echo "<button class='btn btn-warning' onclick='manageBook({$row['BookID']}, \"return\")'>Return</button>";
                }

                // Display Edit and Delete buttons for Admin
                if ($_SESSION['user_type'] == 'Admin') {
                    echo "<button class='btn btn-info' onclick='editBook({$row['BookID']})'>Edit</button>
                        <button class='btn btn-danger' onclick='deleteBook({$row['BookID']})'>Delete</button>";
                }

                echo "</td></tr>";
            }

            echo "</tbody></table>";
        } else {
            // Display a message for users who are not logged in
            echo "You do not have permission to access this page.";
        }
        ?>
    </div>

    
    </div>
    <?php include_once "../includes/footer.php"; ?>
</body>


</html>