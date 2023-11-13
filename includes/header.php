<?php
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
</head>

<body>

    <header class="-indigo-400">
        <!-- Navbar with always visible burger menu -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="fixed-top container-fluid header">
                <!-- Burger button always visible -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span  class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar brand -->
                <a class=" logo" href="../pages/index.php">Library of Sydney</a>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse text-center" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../pages/index.php">
                                <i class="bi bi-house-door"></i> HOME
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/admin_panel.php">
                                <i class="bi bi-book"></i>BOOKS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person"></i> ABOUT US
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-headphones"></i> AUDIOBOOKS
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-journals"></i> BLOG
                            </a>
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
                                        <button type="submit" class="btn btn-link logout" name="logout">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link login" href="../pages/login.php">
                                        <i class="bi bi-box-arrow-in-right"></i> Log in
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>