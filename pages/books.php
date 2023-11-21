<?php
session_start();
error_reporting(E_ALL);


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
    <title>Books</title>


    <!-- Common AJAX function -->
    <script src="../assets/js/admin_functions.js"></script>
    <script>
        function sendAjaxRequest(url, successCallback, failureCallback) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) try {
                        var response = JSON.parse(xhr.responseText);
                        successCallback(response);
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        failureCallback(xhr);
                    } else if (xhr.status == 400) {
                        console.error("Error: " + xhr.status + ", " + xhr.statusText);
                        failureCallback();
                    } else {
                        console.error("Error: " + xhr.status + ", " + xhr.statusText);
                        failureCallback();
                    }
                }
            };
            xhr.send();
        }

       
        

        // function handleSuccess(response) {
        //     if (response.status === 'success') {
        //         window.location.reload();
        //     } else {
        //         alert(response.message);
        //     }
        // }

        function handleFailure() {
            alert("An error occurred. Please try again.");
        }

        function manageBook(bookId, action) {
            var url = (action === 'borrow') ? "../backend/process_borrow.php" : "../backend/process_return.php";

            $.ajax({
                url: `${url}?book_id=${bookId}`,
                type: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                },
                error: function() {
                    alert("An error occurred. Please try again.");
                }
            });
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
    <div class="container header-offset">
        <div class="row text-center mt-3">

            <div class="col-12  ">
                <p class="some-text">Please login if you want to get a book!</p>

                <!-- Display list of books -->
                <div class="row text-center shadow">
                    <?php
                    // Loop through the result set and display book information
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-sm-12 col-md-6 col-lg-4 mb-4 '>";
                        echo "<div class='card text-center'>";
                        echo "<img src='../images/{$row['ImagePath']}' alt='{$row['Title']}' class=' card-img-top img-fluid' style='max-width: 200px; height: 350px;'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>{$row['Title']}</h5>";
                        echo "<p class='card-text'>Author: {$row['Author']}<br>Publisher: {$row['Publisher']}<br>Status: {$row['status']}</p>";
                        echo "<div class='btn-group'>";


                        echo "</div></div></div></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "../includes/footer.php"; ?>
    
</body>

</html>