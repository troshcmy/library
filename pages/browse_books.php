<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse and Borrow Books</title>
</head>
<body>
    <?php include_once "../includes/header.php"; ?>

    <div class="container mt-3">
        <h2>Browse and Borrow Books</h2>
        <?php
        // Include your database connection code here if not already included
        $db = new mysqli('localhost', 'root', 'root', 'library_system');

        // Query to get available books
        $query = "SELECT * FROM Books WHERE BookID NOT IN (SELECT BookID FROM bookstatus WHERE Status = 'Onloan')";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h3>" . $row['Title'] . "</h3>";
                echo "<p>Author: " . $row['Author'] . "</p>";
                echo "<p>Publisher: " . $row['Publisher'] . "</p>";
                // Display a button for borrowing the book
                echo "<form action=\"process_borrow.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"book_id\" value=\"" . $row['BookID'] . "\">";
                echo "<button type=\"submit\" class=\"btn btn-primary\">Borrow</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No available books.";
        }
        ?>
    </div>

    <?php include_once "../includes/footer.php"; ?>
</body>
</html>
