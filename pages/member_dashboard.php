<?php
session_start(); // Начало сессии
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member Dashboard</title>
</head>

<body>

  <?php include_once "../includes/header.php" ?>

  <div class="container">

    <h2>Welcome to your Member Dashboard</h2>

    <?php
    // Проверяем, авторизован ли пользователь
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'Member') {
      // Выводим информацию для обычного пользователя
      echo "<p>You are logged in as a Member.</p>";

      // Подключение к базе данных (замените хост, имя пользователя, пароль и имя базы данных на свои)
      $db = new mysqli('localhost', 'root', 'root', 'library_system');

      // Проверка соединения
      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      }

      // Запрос к базе данных для получения списка всех книг
      $query = "SELECT * FROM Books";
      $result = $db->query($query);

      if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                  <th>Book Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Language</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['Title'] . "</td>";
          echo "<td>" . $row['Author'] . "</td>";
          echo "<td>" . $row['Publisher'] . "</td>";
          echo "<td>" . $row['Language'] . "</td>";
          echo "<td>" . $row['Category'] . "</td>";

          // Проверяем, доступна ли книга для аренды или возврата
          // Здесь вы можете добавить другую логику в зависимости от статуса книги
          echo "<td><a href='process_borrow_return.php?book_id=" . $row['BookID'] . "'>Borrow/Return</a></td>";
          echo "</tr>";
        }

        echo "</table>";
      } else {
        echo "No books available.";
      }

      // Закрыть соединение с базой данных
      $db->close();

    } else {
      // Если пользователь не авторизован или его роль не Member, выведите сообщение или перенаправьте его на другую страницу
      echo "<p>You are not authorized to access this page.</p>";
    }
    ?>

  </div>

  <?php include_once "../includes/footer.php" ?>
</body>

</html>
