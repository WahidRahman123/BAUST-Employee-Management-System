<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="reg_style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="register.php" method="post" class="box">
                        <h1>Register</h1>
                        <h6><?php if (isset($_GET['error'])) { ?>
                                <p class="error"> <?php echo $_GET['error']; ?></p>
                            <?php } ?>
                        </h6>
                        <h5><?php if (isset($_GET['res'])) { ?>
                                <p class="res"> <?php echo $_GET['res']; ?></p>
                            <?php } ?>
                        </h5>
                        <p class="text-muted"> Please fill up the following information!</p> <input type="text" name="username" placeholder="Username"> <input type="password" name="password" placeholder="Password"> <input type="email" name="email" id="email" placeholder="Email"> <input type="submit" name="submit" value="Register"> <a href="login_index.php">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>