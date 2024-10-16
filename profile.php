<?php    
        include_once "./header.php";
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);

        include_once "./connection.php";
         session_start();
                if ($_SESSION['Privilages'] == NULL ) {
          # code...
            session_destroy();
            session_unset();            
            header("location:index.php");
        }
            

        // FOR EVERY USER PAGE;
         $Id=$_SESSION['ID'];                 
            // echo $Id."ID".$_SESSION['ID'] ;
        if (!isset($_SESSION["name"])) {
            header("Location: ./index.php");
        }else{
            $user_profile_data=mysqli_query($conn,"SELECT * FROM users where Id='$Id' ");

            if (mysqli_num_rows($user_profile_data)>0) {
                    # code...
                    $user_profile_results=mysqli_fetch_assoc($user_profile_data);
                }
            elseif (mysqli_num_rows($user_profile_data)==0) {
                # code...
                session_destroy();
                session_unset();            
                header("location:index.php");
            }
        }
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">

    <!-- <link rel="icon" href="./assets/images/books.png"> -->
    <link rel="icon" href="./assets/images/books.png" type="image/png">

    <!--Custom CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>


    <div class="container">

        <div class='jumbotron jumbotron-fluid text-center color-set'>
            <div class="container">
                <h1 class='display-3'>
                    Manage Your Profile
                </h1>
                <p class='lead'>
                    Here you will be able to edit your information
                </p>

            </div>
        </div>

        <div class="col-md-6 mx-auto">

            <div class='card'>


                <div class="card-header color-set">

                    Your Profile Information
                </div>
                <div class='card-body '>
                   
                    <div class="row">

                        <div class="col-md-8">
                            <div class='detail-text'>
                                <label for="name"><strong>UserID:</strong></label>
                                <span class='text-data'> <?php   echo $user_profile_results['Id'];   ?></span>
                            </div>

                            <div class='detail-text'>
                                <label for="name"><strong>Name:</strong></label>
                                <span class='text-data'> <?php   echo $user_profile_results['Username'];   ?></span>
                            </div>

                            <div class='detail-text'>
                                <label for="name"><strong>Email:</strong></label>
                                <span class='text-data'><?php  echo $user_profile_results['Email']; ?></span>
                            </div>

                            <div class='detail-text'>
                                <label for="name"><strong>Account Status:</strong></label>
                                <span class='text-data'> Verified</span>
                            </div>

                            <hr/>
                            <div class='detail-text'>
                                <label for="name"><strong>Created at:</strong></label>
                                <span class='text-data'><?php echo $user_profile_results['CreatedAt']; ?></span>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <a href="https://placeholder.com"><img src="./bray.jpg" alt="" srcset=""></a>

                        </div>
                    </div>

                </div>
                
                <div class='card-footer'>
                    <a href='' data-toggle="modal" data-target="#myModal"><i class='fa fa-trash-o'></i></a>
                    <a href="./edit_profile.php" class='pull-right'> <span  color=red > Edit Profile</span> <i class='fa fa-pencil-square-o'></i></a>
                </div>

            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style='cursor:pointer;'>&times;</button>

                    </div>
                    <div class="modal-body text-center">
                        <p>Do you really want to delete your account?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger">Yes</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal" style='cursor:pointer;'>No</button>
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
