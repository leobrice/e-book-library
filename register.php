<?php
    include_once "./connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login &amp; Register</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
     <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">

    <!--Custom CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- <link rel="icon" href="./assets/images/books.png"> -->
    <link rel="icon" href="./assets/images/books.png" type="image/png"> 

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
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="./Admin/index.php">Admin</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./register.php">Register </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Login</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>

    <div class="container">


        <div class="row">

            <div class="col-md-6 mx-auto">
                <div class='card card-body  bg-light mt-2 mb-5'>
                    <h2>Register</h2>
                    <p>Please fill in credentials to Sign Up.</p>
                    <form action="register_now.php" method='POST'>
                        <?php
                                // if(isset($message)){
                                //     foreach ($message as $message) {
                                //         # code...
                                //         echo "$message";
                                //         // echo '<script>'.alert("User already exist");'</script>';
                                //     }
                                // }

                        ?>
                        
                        <div class="form-group">
                            <label for='username'>Username: <sup>*</sup></label>
                            <input type='text' name="username" class='form-control form-control-lg'>
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="form-group">
                            <label for='email'>Email: <sup>*</sup></label>
                            <input type='email' name="email" class='form-control form-control-lg'>
                            <span class="invalid-feedback"></span>
                        </div>
                             <?php  
                        //  require_once "./login_now.php";
                         if ($_GET['ErrorPassword']==true) {
                            # code...
                         
                         ?> 
                         <div class="alert-light text-danger text-center" ><?php  echo $_GET['ErrorPassword']  ;?></div>
                         <?php
                            }
                         ?>                                   
                        <div class="form-group">
                            <label for='password'>Password: <sup>*</sup></label>
                            <input type='password' name="password"  id="myInput1" class='form-control form-control-lg'>
                            <input type="checkbox" onclick="confirmPassword1()" >Show Password 
                            <span class="invalid-feedback"></span>
                            
                            
                            
                        </div>
                        
                        <div class="form-group">
                            <label for='confirm_password'>Confirm Password: <sup>*</sup></label>
                            <input type='password' name="confirm_password" id="myInput" class='form-control form-control-lg' >
                           
                            <input type="checkbox" onclick="confirmPassword()" >Show Password 
                            <span class="invalid-feedback"></span>
                            <script> 
                                // function confirm_password() {
                                var state=false;
                                function	confirmPassword(){
                                
                                    if(state){
                                      document.getElementById("myInput").setAttribute("type","password");

                                      
                                     state=false;
                                    }
                                  else{			      
                                    document.getElementById("myInput").setAttribute("type","text");
                                    state=true;
                                  }
                                  }

                                  function	confirmPassword1(){
                                
                                    if(state){
                                      document.getElementById("myInput1").setAttribute("type","password");

                                      
                                     state=false;
                                    }
                                  else{			      
                                    document.getElementById("myInput1").setAttribute("type","text");
                                    state=true;
                                  }
                                  }


                            </script>
                        </div>


                        <div class="row">

                            <div class='col'>

                                <input type='submit' id="register" name='register' value='Register' class='btn  btn-block color-set'>
                                   <script>

                                   </script> 
                            </div>



                        </div>
                        <div class="row">
                            <div class='col'>

                                <a href="./index.php" class="btn  btn-block">Have account? Login</a>

                            </div>
                        </div>


                    </form>

                </div>
            </div>

        </div>


    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


    <!--CUSTOM JS-->
    <script src="assets/js/script.js"></script>
   <script>
        document.getElementById("danger").style.visibility='hidden';
        var pass1=document.getElementById("myInput1").value;
        var pass2=document.getElementById("myInput").value;
            if(pass1==pass2){
                document.getElementById("danger").style.visibility='hidden';
                }
            else{
                document.getElementById("danger").style.visibility='hidden';
            }
    </script>

</body>

</html>
