<?php
include("config.php");

$sql = "SELECT * FROM Book";
$result = $conn->query($sql);

// Borrow Book Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST["book_id"];
    $memberID = $_SESSION["user_id"];
    $dueDate = date("Y-m-d", strtotime("+21 days"));

    $sql = "INSERT INTO BookStatus (BookID, MemberID, Status, DueDate) 
            VALUES ('$bookID', '$memberID', 'Onloan', '$dueDate')";

    // Execute the query and handle success/failure
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Browse and Borrow Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<p>Book Title: " . $row["Title"] . "</p>";
            // Display other book details
            echo "<form action='browse_and_borrow.php' method='POST'>";
            echo "<input type='hidden' name='book_id' value='" . $row["BookID"] . "'>";
            echo "<button type='submit' class='btn btn-primary'>Borrow</button>";
            echo "</form><br>";
        }
        ?>
    </div>
</body>
</html>
