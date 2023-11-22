<?php
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

    // Check if image upload is successful
    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // Image upload is successful
        // Start transaction
        $db->begin_transaction();

        try {
            // Save book information to Books table
            $query = "INSERT INTO Books (Title, Author, Publisher, Language, Category, ImagePath, status, StatusID) VALUES (?, ?, ?, ?, ?, ?, 'Available', 1)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssssss', $title, $author, $publisher, $language, $category, $imageName);

            

            if ($stmt->execute()) {
                $db->commit();
                // Redirect with success parameter
                header("Location: ../pages/add_book.php?success=true");
                exit();
            } else {
                // Rollback transaction if insert fails
                $db->rollback();
                // Redirect with error parameter
                header("Location: ../pages/add_book.php?success=false");
                exit();
            }
        } catch (Exception $e) {
            // Rollback transaction if there's an error
            $db->rollback();
            // Redirect with error parameter
            header("Location: ../pages/add_book.php?success=false&message=" . urlencode("Error: " . $e->getMessage()));
            exit();
        }
    } else {
        // Image upload failed
        // Redirect with error parameter
        header("Location: ../pages/add_book.php?success=false&message=" . urlencode("Error uploading image"));
        exit();
    }
}
?>