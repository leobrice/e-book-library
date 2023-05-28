<?php
        session_start();
        include_once "./includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">
    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    
    <!-- Top Icon -->
    <link rel="icon" href="../assets/images/books.png" type="image/png">

    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">


    <title>Document</title>
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
                        <a class="nav-link" href="../index.php">Home </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ">
                        <a class="nav-link" href="../register.php">Register </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Admin</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>

    <div class="container">


        <div class="row">

            <div class="col-md-6 mx-auto">
                <div class='card card-body  bg-light mt-5'>
                    <h2>Admin Login</h2>
                    <p>Please fill in credentials to log in.</p>
                   
                    <form action="admin_login.php" method='POST'>
                         <?php  
                        //  require_once "./login_now.php";
                         if ($_GET['message']==true) {
                            # code...
                         
                         ?> 
                         <div class="alert-light text-danger text-center" ><?php  echo $_GET['message']  ;?></div>
                         <?php
                            }
                         ?>
                        <div class="form-group">
                            <label for='email'>Username: <sup>*</sup></label>
                            <input type='text' name="username" class='form-control form-control-lg'>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class=" pass">
                            <label for='password'>Password: <sup>*</sup></label>
                            <span><i class="fa fa-eye" id="eye"></i></span>
                            <input type="password" name="password" class='form-control form-control-lg' autocomplete="current-password">
                            
                        </div>
                        <div class="form-check mb-2 text-center">
                            <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remeberme"> -->
                            <!-- <label class="form-check-label text-primary" for="exampleCheck1">Remember Me</label> -->
                        </div>
                        <div class="row">
                            <div class='col'>
                                <input type='submit' name='login' value='Login' class='btn  btn-block color-set'>
                            </div>

                        </div>
                        <div class="row">
                            <div class='col'>

                                <a href="./forget_password.html" class="btn  btn-block">Forget Passsword?</a>

                            </div>


                            <div class='col'>

                                <a href="./register.php" class="btn  btn-block">No account? Register</a>

                            </div>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> -->

    <!--CUSTOM JS-->
    <script src="assets/js/script.js"></script>

</body>

</html>