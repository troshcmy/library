<?php
session_start();
include_once "../includes/conn.php";

// Проверяем, является ли пользователь администратором
$isAdmin = isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Admin';

// Проверяем, был ли отправлен запрос на поиск
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];

    // Выполняем поиск в базе данных
    $searchResultQuery = "SELECT * FROM Books WHERE Title LIKE '%$searchQuery%' OR Author LIKE '%$searchQuery%' OR Publisher LIKE '%$searchQuery%' OR Language LIKE '%$searchQuery%' OR Category LIKE '%$searchQuery%'";
    $searchResult = $db->query($searchResultQuery);
} else {
    // Если запрос на поиск не был отправлен, перенаправляем пользователя на главную страницу
    header("Location: /index.php");
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

    <div class="container mt-3">
        <h2>Search Results</h2>

        <?php
        // Вывод результатов поиска
        if ($searchResult && $searchResult->num_rows > 0) {
            echo "<table class='table'>
                <thead>
                    <tr>
                        <th>BookID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Image</th>
                        <th>Status</th>";

            // Если пользователь администратор, добавляем заголовки для административных действий
            if ($isAdmin) {
                echo "<th>Action</th>";
            }

            echo "</tr>
                </thead>
                <tbody>";

            while ($row = $searchResult->fetch_assoc()) {
                // Выводите результаты как вам удобно
                echo "<tr>
                        <td>{$row['BookID']}</td>
                        <td>{$row['Title']}</td>
                        <td>{$row['Author']}</td>
                        <td>{$row['Publisher']}</td>
                        <td><img src='../images/{$row['ImagePath']}' alt='{$row['Title']}' style='width: 150px; height: auto;'></td>
                        <td>{$row['status']}</td>";

                // Если пользователь администратор, добавляем административные действия
                if ($isAdmin) {
                    echo "<td>
                            <a href='borrow_book.php?book_id={$row['BookID']}'>Borrow</a>
                            <a href='return_book.php?book_id={$row['BookID']}'>Return</a>
                            <a href='edit_book.php?book_id={$row['BookID']}'>Edit</a>
                            <a href='delete_book.php?book_id={$row['BookID']}'>Delete</a>
                          </td>";
                }

                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No results found.";
        }
        ?>

    </div>

    <?php include_once "../includes/footer.php"; ?>
    <script src="../assets/js/admin_functions.js"></script>
</body>

</html>
