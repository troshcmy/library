<?php
session_start();
include_once "../includes/conn.php";

// Check if the search query is set
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];

    // Execute search query in the database
    $searchResultQuery = "SELECT * FROM Books WHERE Title LIKE '%$searchQuery%' OR Author LIKE '%$searchQuery%' OR Publisher LIKE '%$searchQuery%' OR Language LIKE '%$searchQuery%' OR Category LIKE '%$searchQuery%'";
    $searchResult = $db->query($searchResultQuery);
} else {
    // If no search query is set, redirect to the main page
    
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include_once "../includes/header.php"; ?>

    <div class="container mt-3 header-offset text-center">
        <h2>Search Results</h2>

        <div class="row">
            <?php
            if ($searchResult && $searchResult->num_rows > 0) {
                while ($row = $searchResult->fetch_assoc()) {
                    echo "<div class='col-sm-12 card-center col-md-6 col-lg-4 mb-4'>";
                    echo "<div class='card'>";
                    echo "<div class='inner-card text-center'>";
                    echo "<img src='../images/{$row['ImagePath']}' alt='{$row['Title']}' class='card-img-top img-fluid' style='max-width: 200px; height: 350px;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$row['Title']}</h5>";
                    echo "<p class='card-text'>Author: {$row['Author']}<br>Publisher: {$row['Publisher']}<br>Status: {$row['status']}</p>";
                    echo "</div></div></div></div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='lead'>No results found.</p>";
            }
            ?>
        </div>
    </div>

    <?php include_once "../includes/footer.php"; ?>
</body>

</html>
