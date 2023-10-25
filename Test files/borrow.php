<?php
include("config.php");

if (isset($_GET["book_id"])) {
    $bookID = $_GET["book_id"];
    $memberID = $_SESSION["user_id"];
    $dueDate = date("Y-m-d", strtotime("+21 days"));

    $sql = "INSERT INTO BookStatus (BookID, MemberID, Status, DueDate) 
            VALUES ('$bookID', '$memberID', 'Onloan', '$dueDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Book borrowed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrow Book</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your custom styles -->
    <style>
        /* Additional styles */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .btn-borrow {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Borrow Book</h4>
                        <p>Click the button below to borrow the book.</p>
                        <form id="borrow-form" action="borrow.php" method="GET">
                            <input type="hidden" name="book_id" value="<?php echo $_GET['book_id']; ?>">
                            <button type="submit" class="btn btn-borrow btn-block">Borrow Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (before closing </body> tag) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your JavaScript scripts -->
    <script>
        // Your scripts here
    </script>
</body>
</html>
