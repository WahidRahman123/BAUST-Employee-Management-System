<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="home_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>


        <!--For Navigation-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">DATABASE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fpage.php">Employees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#opening">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!--For Slide Images-->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="baust_pic1.jpg" class="d-block w-100" alt="BAUST">
                </div>
                <div class="carousel-item">
                    <img src="baust_pic2.jpg" class="d-block w-100" alt="BAUST 2nd pic">
                </div>
                <div class="carousel-item">
                    <img src="laboratory.jpg" class="d-block w-100" alt="CSE Laboratory">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--Another Section-->





        <h2 style="margin-top:20px;text-shadow: 5px 3px 5px black; color:rgb(37, 173, 48); text-align:center;">Banladesh Army
            University of Science & Technology</h2><br>
        <img style="margin-left: 552px;box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3);" src="BAUST Logo.png" alt="BAUST Logo" width="250" height="240"><br><br>

        <p class="box"><br><button><a href="create.php">ADD EMPLOYEE</a></button><br>
            <button><a href="fpage.php">EMPLOYEE LIST</a></button><br>
            <button><a href="Search.php">SEARCH EMPLOYEE</a></button><br>
            <button><a href="logg_page.php">REGISTERED PERSON LIST</a></button><br>
        </p>

<br><br>
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-dark text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

            </section>

            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>BAUST
                            </h6>
                            <p style="text-align:justify" id="opening">
                                Bangladesh Army University of Science & Technology (BAUST), the pioneer technical institutes of Armed Forces, started its journey from 15th February 2015. It was the visionary leadership of the honorable prime minister of People’s Republic of Bangladesh Sheikh Hasina to establish a technical institute of Armed Forces.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!--Google Map-->
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="380" height="232" id="gmap_canvas" src="https://maps.google.com/maps?q=BAUST&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 232px;
                                        width: 380px;
                                    }
                                </style><a href="https://www.embedgooglemap.net">google map on my website</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 232px;
                                        width: 380px;
                                    }
                                </style>
                            </div>
                        </div>
                        <!--Google Map-->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contact
                            </h6>
                            <p><i class="fas fa-home me-3"></i> Saidpur Cantonment, Saidpur</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@baust.edu.bd
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +880 176 967 5554</p>
                            <p><i class="fas fa-print me-3"></i> +880 176 967 5553</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="https://www.baust.edu.bd/">Baust.edu.bd</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
} else {
    header("Location: login_index.php");
    exit();
}
?>