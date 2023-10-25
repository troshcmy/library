<?php


// Logout logic
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../pages/login.php");
    exit();
}

$loggedIn = isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Include your custom CSS link -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Library Management System</title>
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Library Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Books</a>
                        </li>
                        <?php if ($loggedIn) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/admin_panel.php">Admin panel</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <span class="navbar-text">
                        <ul>
                            <?php if ($loggedIn) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/pages/login.php">Logout</a>
                            </li>
                            <?php else : ?>
                            <li class="nav-item">
                            <a class="nav-link" href="../pages/login.php">Log in</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </span>
                </div>
            </div>
            <form class="d-flex" action="../pages/search.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
</body>

</html>
