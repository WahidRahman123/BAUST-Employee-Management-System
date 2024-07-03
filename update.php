<?php
require_once "config.php";

$name = $rank = $salary = $email = "";
$name_err = $rank_err = $salary_err = $email_err = "";

if (isset($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];
    //Name:
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a valid name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name";
    } else {
        $name = $input_name;
    }

    //Rank:
    $input_rank = trim($_POST["rank"]);
    if (empty($input_rank)) {
        $rank_err = "Please enter your rank";
    } elseif (!filter_var($input_rank, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^([a-zA-Z' ]+)$/")))) {
        $rank_err = "Please enter valid rank";
    } else {
        $rank = $input_rank;
    }

    //Salary:
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";
    } elseif (!ctype_digit($input_salary)) {
        $salary_err = "Please enter a positive integer value.";
    } else {
        $salary = $input_salary;
    }

    //Email:
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter your email addreas.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid.";
    } else {
        $email = $input_email;
    }

    //Checking input errors:
    if (empty($name_err) && empty($rank_err) && empty($salary_err) && empty($email_err)) {
        $sql = "UPDATE info SET Name = ?, Rank = ?, Salary = ?, Email = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssisi", $param_name, $param_rank, $param_salary, $param_email, $param_id);

            //Setting parameters:
            $param_name = $name;
            $param_rank = $rank;
            $param_salary = $salary;
            $param_email = $email;
            $param_id = trim($_POST["id"]);

            if (mysqli_stmt_execute($stmt)) {
                header("location: fpage.php");
            } else {
                echo "Something went wrong. Please try agein later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM info WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["Name"];
                    $rank = $row["Rank"];
                    $salary = $row["Salary"];
                    $email = $row["Email"];
                } else {
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);

        mysqli_close($link);
    } else {
        header("location: error.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #F4C430;
        }

        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
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
<br><br>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Rank</label>
                            <input type="text" name="rank" class="form-control <?php echo (!empty($rank_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rank; ?>">
                            <span class="invalid-feedback"><?php echo $rank_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="fpage.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
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