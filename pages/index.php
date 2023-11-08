<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Include your CSS styles -->
    <link rel="stylesheet" href="./style.css">
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Include Bootstrap Icons for icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.21.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include_once "../includes/header.php"; ?>

    <!-- ---------- Hero Section ---------->
    <section class="hero">
        <div class="hero-bg">
            <div class="hero-text container text-center">
                <!-- Your hero content goes here -->
                <h1>Welcome to Our Library</h1>
                <p>Explore a world of knowledge with our vast collection of books and audiobooks.</p>
                <a href="./admin_panel.php" class="btn btn-primary">Explore Now</a>
            </div>
        </div>
    </section>

    <!----------------------- Books Section ---------------->


             <!-- Fantasy Section -->

<section class="books text-center">
    <div class="container text-center">
        <h2 >Fantasy</h2>
        <div class="row">
            <!-- Book 1 -->
            <div class=" col-sm-6 col-md-4 mb-4">
                <div class="card">
                    <img src="../images/61jgm6ooXzL._AC_UF1000,1000_QL80_.jpg" class="card-img-top" alt="Fantasy Book 1">
                    <div class="card-body">
                        <h5 class="card-title">The Philosopher's Stone</h5>
                        <p class="card-text">J.K. Rowling</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            <!-- Book 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/The_Fellowship_of_the_Ring_cover.gif" class="card-img-top" alt="The Lord of The Rings">
                    <div class="card-body">
                        <h5 class="card-title">The Fellowship of the Ring</h5>
                        <p class="card-text">J.R.R. Tolkien</p>
                        <a href="#" class="btn btn-primary ">Details</a>
                    </div>
                </div>
            </div>

            <!-- Book 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg" class="card-img-top" alt="Fantasy Book 3">
                    <div class="card-body">
                        <h5 class="card-title">Harry Potter and the Prisoner of Azkaban</h5>
                        <p class="card-text">J.K. Rowling</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

            <!-- Mystery Section -->

<section class="books">
    <div class="container text-center">
        <h2>Mystery</h2>
        <div class="row">
            <!-- Book 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/Cover_(Hound_of_Baskervilles,_1902).jpg" class="card-img-top" alt="Mystery Book 1">
                    <div class="card-body">
                        <h5 class="card-title">The Hound of the Baskervilles</h5>
                        <p class="card-text">Arthur Conan Doyle</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            <!-- Book 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/Gone_Girl_(Flynn_novel).jpg" class="card-img-top" alt="Mystery Book 2">
                    <div class="card-body">
                        <h5 class="card-title">Gone Girl</h5>
                        <p class="card-text">Gillian Flynn</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            <!-- Book 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/DaVinciCode.jpg" class="card-img-top" alt="Mystery Book 3">
                    <div class="card-body">
                        <h5 class="card-title">The Da Vinci Code</h5>
                        <p class="card-text">Dan Brown</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Science Fiction Section -->
<section class="books">
    <div class="container text-center">
        <h2>Science Fiction</h2>
        <div class="row justify-content-center">
            <!-- Book 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/Heretics_of_Dune-Frank_Herbert_(1984)_First_edition.jpg" class="card-img-top" alt="Science Fiction Book 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dune</h5>
                        <p class="card-text">Frank Herbert</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            <!-- Book 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/Ender's_game_cover_ISBN_0312932081.jpg" class="card-img-top" alt="Science Fiction Book 2">
                    <div class="card-body">
                        <h5 class="card-title">Ender's Game</h5>
                        <p class="card-text">Orson Scott Card</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            <!-- Book 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../images/H2G2_UK_front_cover.jpg" class="card-img-top" alt="Science Fiction Book 3">
                    <div class="card-body">
                        <h5 class="card-title">The Hitchhiker's Guide to the Galaxy</h5>
                        <p class="card-text">Douglas Adams</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Slider 1 Section -->
    <section class="slider">
        <div class="container">
            <!-- Your slider content goes here -->
            <div id="slider1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                   
                    <div class="carousel-item active">
                        <img src="slide1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item active">
                        <img src="slide1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item active">
                        <img src="slide1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Audiobooks Section -->
    <section class="audiobooks">
        <div class="container">
            <!-- Audiobooks grid (replace with your dynamic content) -->
            <div class="row">
                <!-- Repeat this block for each audiobook -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="audio1.jpg" class="card-img-top" alt="Audiobook 1">
                        <div class="card-body">
                            <h5 class="card-title">Audiobook Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Listen Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="audio1.jpg" class="card-img-top" alt="Audiobook 1">
                        <div class="card-body">
                            <h5 class="card-title">Audiobook Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Listen Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="audio1.jpg" class="card-img-top" alt="Audiobook 1">
                        <div class="card-body">
                            <h5 class="card-title">Audiobook Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Listen Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="audio1.jpg" class="card-img-top" alt="Audiobook 1">
                        <div class="card-body">
                            <h5 class="card-title">Audiobook Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Listen Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="audio1.jpg" class="card-img-top" alt="Audiobook 1">
                        <div class="card-body">
                            <h5 class="card-title">Audiobook Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Listen Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="audio1.jpg" class="card-img-top" alt="Audiobook 1">
                        <div class="card-body">
                            <h5 class="card-title">Audiobook Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary">Listen Now</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat -->
            </div>
        </div>
    </section>

    <!-- Slider 2 Section -->
    <section class="slider">
        <div class="container">
            <!-- Your second slider content goes here -->
            <div id="slider2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Repeat this block for each slide -->
                    <div class="carousel-item active">
                        <img src="slide2.jpg" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item active">
                        <img src="slide2.jpg" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item active">
                        <img src="slide2.jpg" class="d-block w-100" alt="Slide 2">
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <?php include_once "../includes/footer.php"; ?>

    <!-- Bootstrap and related scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+
