<?php
include 'include_php/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Cabin</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php include 'include_php/header.php';?>
    <main>
        <div class="back-btn"><a href="admin_dash.php">Back to Dashboard</a></div>

        <div class="insert-container">  
            <form method="POST" action="insert_process.php" enctype="multipart/form-data">
            <?php
                if (isset($_GET['success']) && $_GET['success'] == 'true') {
                    echo '<span id="success-message" class="success-message">Cabin Added Successfully!</span>';
                }
            ?>
                <h2>Add New Cabin</h2>
                <label for="cabinType">Cabin Type:</label>
                <input type="text" name="cabinType" required><br>

                <label for="pricePerNight">Price per Night:</label>
                <input type="number" name="pricePerNight" required><br>

                <label for="pricePerWeek">Price per Week:</label>
                <input type="number" name="pricePerWeek" required><br>
                <label for="cabinDescription">Cabin Description:</label>
                <textarea name="cabinDescription" required></textarea><br>
                <label for="pricePerWeek">Photo</label>
                <input type="file" name="photo" accept="image/*"><br>
                
                
                <label for="available_inclusions">Inclusion List:</label><br>
                <!-- Fetch and display available inclusions -->
                <?php
                $availableInclusionQuery = "SELECT incID, incName FROM inclusion";
                $availableInclusionResult = $conn->query($availableInclusionQuery);

                while ($availableInclusionRow = $availableInclusionResult->fetch_assoc()) {
                    echo '<input type="checkbox" name="available_inclusions[]" value="' . $availableInclusionRow['incID'] . '"> ' . $availableInclusionRow['incName'] . '<br>';
                }
           
                ?>
                
                <script src="js/main.js"></script>

                          
               


                <input type="submit" name="add_cabin" value="Add Cabin">
            </form>
        </div>
    </main>
    <?php include 'include_php/footer.php';?>
</body>
</html>