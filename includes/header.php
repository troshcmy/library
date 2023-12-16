<?php

// session_start();
// Logout logic
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../pages/login.php");
    exit();
}



$loggedIn = isset($_SESSION['user_type']) ? $_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Member' : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Library of Sydney</title>
    <link rel="stylesheet" href="../pages/style.css">
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap and related scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- other head elements -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


</head>



<body>

    <header class="-indigo-400">
        <!-- Navbar with always visible burger menu -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="fixed-top container-fluid header">
                <!-- Burger button always visible -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar brand -->
                <a class=" logo" href="../pages/index.php">Library of Sydney</a>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse text-center" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" id="home-link" href="../pages/index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['user_type'])) {
                                echo '<a class="nav-link" id="books-link" href="../pages/admin-member-books-page.php">BOOKS</a>';
                            } else {
                                echo '<a class="nav-link" id="books-link" href="../pages/books.php">BOOKS</a>';
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="about-link" href="../pages/about.php">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-link" href="../pages/contact.php">CONTACT US</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../pages/search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <span class="navbar-text">
                        <ul>
                            <?php if ($loggedIn) : ?>
                                <li class="nav-item">
                                    <form method="post">
                                        <button type="submit" class="btn-link logout text-white" name="logout">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link login text-white" href="../pages/login.php">
                                        <i class="bi bi-person-fill"></i> Login
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
        <!-- <script>
            // Get the current page URL
            var currentPageUrl = window.location.href;

            // Get the navigation links
            var navLinks = document.getElementsByClassName('nav-link');

            // Loop through the navigation links
            for (var i = 0; i < navLinks.length; i++) {
                // If the navigation link URL matches the current page URL
                if (navLinks[i].href === currentPageUrl) {
                    // Add the "active" class to the navigation link
                    navLinks[i].classList.add('active');
                }
            }
        </script> -->
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the mobile menu button and the mobile menu itself
            var mobileMenuButton = document.querySelector('.navbar-toggler');
            var mobileMenu = document.querySelector('.navbar-collapse');

            // Function to close the mobile menu
            function closeMobileMenu() {
                mobileMenuButton.classList.add('collapsed');
                mobileMenu.classList.remove('show');
            }

            // Add a click event listener to the document
            document.addEventListener('click', function (event) {
                // Check if the clicked element is not part of the mobile menu
                if (!mobileMenu.contains(event.target) && event.target !== mobileMenuButton) {
                    // Close the mobile menu
                    closeMobileMenu();
                }
            });

            // Get the current page URL
            var currentPageUrl = window.location.href;

            // Get the navigation links
            var navLinks = document.getElementsByClassName('nav-link');

            // Loop through the navigation links
            for (var i = 0; i < navLinks.length; i++) {
                // If the navigation link URL matches the current page URL
                if (navLinks[i].href === currentPageUrl) {
                    // Add the "active" class to the navigation link
                    navLinks[i].classList.add('active');
                }
            }
        });
    </script>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>