<?php 
include 'includes/conn.php';

if (isset($_POST['add_cabin'])) {
    // Get the form inputs
    $cabinType = $_POST['cabinType'];
    $cabinDescription = $_POST['cabinDescription'];
    $pricePerNight = $_POST['pricePerNight'];
    $pricePerWeek = $_POST['pricePerWeek'];
    $photo = isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] !== '' ? $_FILES['photo']['name'] : "testCabin.jpg"; // Use "default.jpg" if no photo is uploaded

    // File upload handling
    if (isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] !== '') {
        $target_dir = "images/"; // Directory to store the uploaded images
        $target_file = $target_dir . basename($_FILES['photo']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Sorry, the file already exists.";
            $uploadOk = 0;
        }

        // Check the file size
        if ($_FILES['photo']['size'] > 500000) {
            echo "Sorry, the file is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats (modify this as per your requirements)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // If the file upload is successful, move the file to the target directory
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                echo "File uploaded successfully.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, your file was not uploaded.";
        }
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO cabin (cabinType, cabinDescription, pricePerNight, pricePerWeek, photo) 
            VALUES ('$cabinType', '$cabinDescription', '$pricePerNight', '$pricePerWeek', '$photo')";

if ($conn->query($sql) === TRUE) {
    // Get the newly inserted cabin ID
    $cabinID = $conn->insert_id;

    if (isset($_POST['available_inclusions'])) {
        $availableInclusions = $_POST['available_inclusions'];
        foreach ($availableInclusions as $incID) {
            $insertQuery = "INSERT INTO cabininclusion (cabinID, incID) VALUES ($cabinID, $incID)";
            $conn->query($insertQuery);
        }
    }

    // Redirect back to insert_cabin.php with success status
    header("Location: insert_cabin.php?success=true");
    exit();
} else {
    echo "Error Inserting into table: " . $conn->error;
}

$conn->close();
}
?>