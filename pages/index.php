<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Include your CSS styles -->
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

</head>
<!-- Include Bootstrap Icons for icons -->

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
                <a href="./books.php" class="btn btn-primary">Explore Now</a>
            </div>
        </div>
    </section>

    <!----------------------- Books Section ---------------->


    <!-- Fantasy Section -->

    <section class="books text-center">
        <div class="container text-center">
            <h2>Fantasy</h2>
            <div class="row ">
                <!-- Book 1 -->
                <div class="col-xs-6 card-center col-sm-6 col-md-4 mb-4">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/61jgm6ooXzL._AC_UF1000,1000_QL80_.jpg" class="card-img-top" alt="Fantasy Book 1">
                            <div class="card-body">
                                <h5 class="card-title">The Philosopher's Stone</h5>
                                <p class="card-text">J.K. Rowling</p>
                                <a href="./admin-member-books-page.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
                <!-- Book 2 -->
                <div class="col-xs-6 card-center col-sm-6 col-md-4 mb-4">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/The_Fellowship_of_the_Ring_cover.gif" class="card-img-top" alt="The Lord of The Rings">
                            <div class="card-body">
                                <h5 class="card-title">The Fellowship of the Ring</h5>
                                <p class="card-text">J.R.R. Tolkien</p>
                                <a href="./admin-member-books-page.php" class="btn btn-primary ">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>

                <!-- Book 3 -->
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg" class="card-img-top" alt="Fantasy Book 3">
                            <div class="card-body">
                                <h5 class="card-title">Harry Potter and the Prisoner of Azkaban</h5>
                                <p class="card-text">J.K. Rowling</p>
                                <a href="./admin-member-books-page.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="library-description">
        <div class="container-fluid ">
            <div class="row">
                <!-- Img across all width -->
                <div class="col-md-6 p-0  text-center">
                    <img src="../images/extra_img/img-chris.jpg" alt="Library Image" style="height: 430px; width: 738px;" class="img-fluid ">
                </div>
                <!-- description  -->
                <div class="col-md-6 library-info ">
                    <div class="library-description-text text-left">
                        <h3>Discover the Sydney Library</h3>
                        <p>Step into the Sydney Library, an architectural marvel where each book tells a unique story. From gripping mysteries to insightful historical accounts, our collection spans diverse genres. The library ambiance, enriched with the subtle aroma of aged paper, invites you to explore literature's treasures. Engage in intellectual pursuits, attend literary events, or simply find solace in a cozy reading nook. Our dedicated staff ensures an unforgettable experience. Uncover hidden gems, forge connections with fellow book lovers, and let the Sydney Library be your gateway to a world of endless imagination.</p>


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
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/Cover_(Hound_of_Baskervilles,_1902).jpg" class="card-img-top" alt="Mystery Book 1">
                            <div class="card-body">
                                <h5 class="card-title">The Hound of the Baskervilles</h5>
                                <p class="card-text">Arthur Conan Doyle</p>
                                <a href="./books.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
                <!-- Book 2 -->
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/Gone_Girl_(Flynn_novel).jpg" class="card-img-top" alt="Mystery Book 2">
                            <div class="card-body">
                                <h5 class="card-title">Gone Girl</h5>
                                <p class="card-text">Gillian Flynn</p>
                                <a href="./books.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
                <!-- Book 3 -->
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/DaVinciCode.jpg" class="card-img-top" alt="Mystery Book 3">
                            <div class="card-body">
                                <h5 class="card-title">The Da Vinci Code</h5>
                                <p class="card-text">Dan Brown</p>
                                <a href="./books.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="library-description">
        <div class="container-fluid">
            <div class="row">
                <!-- description  -->
                <div class="col-md-6 library-info">
                    <div class="library-description-text">
                        <h3>Relaxation Oasis and Dining Delights</h3>
                        <p>Indulge in tranquility at our Relaxation Oasis within the Sydney Library. Unwind amidst comfortable seating, surrounded by the soothing ambiance of literary wonders. Whether you seek a moment of reflection or lively discussions, this space caters to diverse needs. Refuel your energy with a delightful array of culinary delights available at our in-house cafe. Savor gourmet meals, snacks, and a variety of beverages. The library invites you to experience not only the joy of reading but also the pleasure of culinary exploration. Cherish moments of serenity, engage in vibrant conversations, and relish the fusion of literature and gastronomy at the Sydney Library.</p>
                    </div>
                </div>
                <!-- Img across all width -->
                <div class="col-md-6 p-0  text-center">
                    <img src="../images/extra_img/diverse-education-shoot.jpg" style="height: 430px; width: 738px;" alt="Relaxation Area Image" class="img-fluid ">
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
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/Heretics_of_Dune-Frank_Herbert_(1984)_First_edition.jpg" class="card-img-top" alt="Science Fiction Book 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">Dune</h5>
                                <p class="card-text">Frank Herbert</p>
                                <a href="./books.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
                <!-- Book 2 -->
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/Ender's_game_cover_ISBN_0312932081.jpg" class="card-img-top" alt="Science Fiction Book 2">
                            <div class="card-body">
                                <h5 class="card-title">Ender's Game</h5>
                                <p class="card-text">Orson Scott Card</p>
                                <a href="./books.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
                <!-- Book 3 -->
                <div class="col-md-4 mb-4 card-center">
                    <div class="card">
                        <div class="inner-card"> <!-- Add this line -->
                            <img src="../images/H2G2_UK_front_cover.jpg" class="card-img-top" alt="Science Fiction Book 3">
                            <div class="card-body">
                                <h5 class="card-title">The Hitchhiker's Guide to the Galaxy</h5>
                                <p class="card-text">Douglas Adams</p>
                                <a href="./books.php" class="btn btn-primary">Details</a>
                            </div>
                        </div> <!-- Add this line -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="portfolio" class="portfolio">
        <div class="container text-center">
            <h4>Events</h4>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-card">Upcoming</li>
                        <li data-filter=".filter-web">Australian's</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">



                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="../images/extra_img/Events-img/anzac2.jpg" style="width: 380px; height: 290px" class="img-fluid" alt="">
                    <h4>ANZAC Day</h4>
                    <div class="portfolio-info">
                        <h4>ANZAC Day</h4>
                        <p>Since 1916 Anzac Day has marked the anniversary of the first major military action fought by Australian and New Zealand forces (the Anzacs) during the Gallipoli campaign of the First World War.Every year Council holds a commemorative service for the community at Anzac Park. The ceremony will be followed by morning tea with a special orchestral performance by Ryde Hunters Hill Symphony Orchestra at Ryde Eastwood Leagues Club.</p>
                        <a href="../images/extra_img/Events-img/anzac-day_sq.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Seniors Yoga"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="../images/extra_img/Events-img/1.jpg" style="width: 380px; height: 290px" class="img-fluid" alt="Seniors Yoga">
                    <h4>Seniors Yoga</h4>
                    <div class="portfolio-info">
                        <h4>Seniors Yoga - Term 4 - Monday (10:30-11:30am)</h4>
                        <p>An affordable yoga class for seniors who are looking for a safe, effective way to enhance their physical health and overall wellness.Yoga is for seniors who are looking for a safe, effective way to enhance their physical health and overall wellness, the stretching, breathing, and meditation practices of yoga can be a great solution.Register and come for a free trial in the first week to see if this right for you</p>
                        <a href="../images/extra_img/Events-img/1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Seniors Yoga"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="../images/extra_img/Events-img//au_day.avif" style="width: 380px; height: 290px" class="img-fluid" alt="Australia Day">
                    <h4>Australia Day</h4>
                    <div class="portfolio-info">
                        <h4>Australia Day</h4>
                        <p>Australia Day is a day to reflect on our past, accept the truth of our history, respect that we all have a contribution to make to the Story of Australia and celebrate being part of a diverse and multicultural nation.</p>
                        <a href="../images/extra_img/Events-img/australia-day_sq_1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="../images/extra_img/Events-img/chinese-arts.png" style="width: 380px; height: 290px" class="img-fluid" alt="Chinese Arts & Literature Reading Group">
                    <h4>Chinese Arts & Literature Reading Group</h4>
                    <div class="portfolio-info">
                        <h4>Chinese Arts & Literature Reading Group</h4>
                        <p>The Chinese Arts & Literature Reading Group allows Mandarin speaking readers to meet others to gain insight into Chinese culture, history and creativity through various Chinese arts and literature.The Group will meet at Ryde Library every second Wednesday of each month from 1 pm to 2:30pm. </p>
                        <a href="../images/extra_img/Events-img/chinese-arts.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Seniors Yoga"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="../images/extra_img/Events-img/mainimage.jpg" style="width: 380px; height: 290px" class="img-fluid" alt="Musical Morning Tea: Kevinwood Orchestra">
                    <h4>Musical Morning Tea: Kevinwood Orchestra</h4>
                    <div class="portfolio-info">
                        <h4>Musical Morning Tea: Kevinwood Orchestra</h4>
                        <p>Celebrate a morning of music with some of the members of the Kevinwood Orchestral Group while enjoying a cuppa and a biscuit.
                            Join us at Ryde Library as Kevinwood will showcase some of the items it is preparing for the fiftieth 'Festival of St Cecilia' at St Kevins Church Eastwood, the concert of which takes place on Sunday 26th November.</p>
                        <a href="../images/extra_img/Events-img/mainimage.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Seniors Yoga"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="../images/extra_img/Events-img/citizenship.webp" style="width: 380px; height: 290px" class="img-fluid" alt="Citizenship Ceremonies">
                    <h4>Citizenship Ceremonies</h4>
                    <div class="portfolio-info">
                        <h4>Citizenship Ceremonies</h4>
                        <p>Citizenship ceremonies fulfil legal requirements prescribed by the Australian Citizenship Act 2007 and the Australian Citizenship Regulations 2007.
                        <h5>2023 Ceremony Dates</h5>
                        <p></p>
                        <ul>

                            <li>Thursday 8 June</li>
                            <li>Thursday 6 July</li>
                            <li>Thursday 24 August</li>
                            <li>Thursday 16 November</li>
                        </ul>

                        </p>
                        <a href="../images/extra_img/Events-img/australia-day_sq_1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <?php include_once "../includes/footer.php"; ?>

    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>