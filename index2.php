<?php
include_once "connection.php";
session_start();
if (!isset($_SESSION['name'])) {
    # code...
     header("location:login.php");
}
else {
    
   
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login &amp; Register</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" > 
    <!--Font awesome cdn-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">

    <!--Custom CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark mb-3 navbar-custom">

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.html">Home </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        echo '<a class="nav-link" href="./logout.php?logout">Logout</a>';
                        ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">

        <div class='jumbotron jumbotron-fluid text-center color-set'>
            <div class="container">
                <h1 class='display-6'>LOGIN &amp; REGSITER</h1>
                <p class="text-lead">Create the complete login and register form</p>
            </div>
        </div>
       <div class="row">
            <div class="col-md-6">
                <div class='card card-custom'>
                    <div class="card-header card-header-custom text-center">
                        <a href="" class="active" id="login-form-link mx-auto">Features [Part - 1]</a>
                    </div>
                    <div class='card-body'>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-group text-center">
                                    <li class="list-group-item">Login / Register</li>
                                    <li class="list-group-item">Profile mangement System</li>
                                    <li class="list-group-item">Forget/Reset Password</li>
                                    <li class="list-group-item">Remember me Option</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class='card card-custom'>
                    <div class="card-header card-header-custom text-center">
                        <a href="" class="active" id="login-form-link mx-auto">Features [Part - 2]</a>
                    </div>
                    <div class='card-body'>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-group text-center">
                                    <li class="list-group-item">Deactivate Account</li>
                                    <li class="list-group-item">Email Verification</li>
                                    <li class="list-group-item">Account Verification</li>
                                    <li class="list-group-item">XSS &amp; SQL injection prevention</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


    <!--CUSTOM JS-->
    <script src="assets/js/script.js"></script>

</body>

</html>
