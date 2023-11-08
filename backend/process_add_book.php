<?php

session_start();

// Проверяем права доступа
// if ($_SESSION['user_type'] !== 'Admin') {
//   http_response_code(403);
//   echo json_encode(['status' => 'error', 'message' => 'Permission denied']);
//   exit();
// }

include_once "../includes/conn.php"; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $category = $_POST['category'];

    // Получаем изображение
    $image = $_FILES['image'];

    // Путь для сохранения изображения
    $uploadDirectory = "../images/";
    $imageName = basename($image['name']);
    $imagePath = $uploadDirectory . $imageName;

    // Проверка ошибок при сохранении изображения
    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        echo 'Possible file upload attack!';
        echo 'Here is some more debugging info:';
        print_r($_FILES);
        exit(); // Добавьте это, чтобы скрипт завершал выполнение после вывода сообщения об ошибке
    }

    // Начало транзакции
    $db->begin_transaction();

    try {
        // Если изображение успешно загружено, сохраняем информацию в таблицу Books
        $query = "INSERT INTO Books (Title, Author, Publisher, Language, Category, ImagePath, status, StatusID) VALUES (?, ?, ?, ?, ?, ?, 'Available', 1)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssssss', $title, $author, $publisher, $language, $category, $imageName);

        // ... (ваш код валидации и проверок)

        // Выполняем запрос на добавление данных в базу данных
        if ($stmt->execute()) {
            $db->commit();

            // Выполняем редирект на вашу страницу с формой
            header("Location: ../pages/add_book.php?success=true");
            exit();
        } else {
            $db->rollback();
            $errorMessage = 'Database execution failed: ' . $stmt->error;
            error_log($errorMessage);
            echo json_encode(['status' => 'error', 'message' => $errorMessage]);
        }
    } catch (mysqli_sql_exception $e) {
        $db->rollback();
        error_log('An error occurred: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
    }
}
?>
