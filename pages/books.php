<!-- Include header -->
<?php include_once "../includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <!-- Include your CSS styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <!-- Fetch categories and counts from the database and display them here -->
            <!-- Example: -->
            <div>
                <h3>Categories</h3>
                <ul>
                    <li><a href="#">Category 1 (Count)</a></li>
                    <li><a href="#">Category 2 (Count)</a></li>
                    <li><a href="#">Category 2 (Count)</a></li>
                    <li><a href="#">Category 2 (Count)</a></li>
                    <!-- Repeat for each category -->
                </ul>
            </div>
        </div>
    </section>

    <!-- Books Grid Section -->
    <section class="books-grid">
        <div class="container">
            <!-- Display a grid of books -->
            <div class="row">
                <!-- Fetch books from the database and display them here -->
                <!-- Example: -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="book1.jpg" class="card-img-top" alt="Book 1">
                        <div class="card-body">
                            <h5 class="card-title">Book Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for each book -->
            </div>
        </div>
    </section>

    <!-- Book Details Section -->
    <section class="book-details">
        <div class="container">
            <!-- Display detailed information about the selected book -->
            <!-- This section is initially hidden and becomes visible when a book is clicked -->
            <!-- Example: -->
            <div>
                <h3>Book Title</h3>
                <img src="book1.jpg" alt="Book 1">
                <p>Author: Author Name</p>
                <p>Rating: 4.5</p>
                <p>Pages: 300</p>
                <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
            </div>
        </div>
    </section>

    <!-- Include footer -->
    <?php include_once "../includes/footer.php"; ?>

    <!-- Bootstrap and related scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>
