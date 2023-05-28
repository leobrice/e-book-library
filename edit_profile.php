<?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
    include_once "./header.php";

     include_once "./connection.php";
    session_start();
    if ($_SESSION['Privilages'] == NULL ) {
          # code...
            session_destroy();
            session_unset();            
            header("location:index.php");
        }
    
       $Id=$_SESSION['ID']; 
       if (!isset($_SESSION["name"])) {
        header("Location: ./index.php");
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
    <title>Edit Profile</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
     <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">

    <!-- <link rel="icon" href="./assets/images/books.png"> -->
    <link rel="icon" href="./assets/images/books.png" type="image/png">

    <!--Custom CSS-->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>



    <div class="container">

        <div class="row">

            <div class="col-md-6 mx-auto">
                <div class='card card-body  bg-light mt-5'>

                    <h2>Update Your account Details <?php echo $Id; ?></h2>
                    <p>
                       

                    </p>
                    <script>
                        //  Finding ID
                            // console.log "<?php echo $id ; ?>"."dew";
                    </script>
            <?php
                       $Id=$_SESSION['ID']; 
        //     $row=mysqli_fetch_array($query);
                // echo id;


                    $user_data=mysqli_query($conn,"SELECT * FROM users where Id='$Id'") or die(mysqli_error());
                    if (mysqli_num_rows($user_data)>0) {
                        # code...
                        $user_results=mysqli_fetch_assoc($user_data);
                    }
            ?>
                    <form action="./user_update_now.php" method='POST'>
                    
                        <div class="form-group">
                            <label for='name'>Username: </label>
                            <input type='text' name="name" value="<?php   echo $user_results['Username']  ?>" class='form-control form-control-lg' >
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for='name'>Email: </label>
                            <input type='text' name="email" value="<?php   echo $user_results['Email']  ?>"  class='form-control form-control-lg'>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for='name'>Current Password: </label>
                            <input type='password' value="<?php echo $user_results['Password'] ?>" name="oldPassword" class='form-control form-control-lg'>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for='name'>New Password: </label>
                            <input type='text' name="newPassword" class='form-control form-control-lg' placeholder="New Password">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="row">
                            <div class='col'>

                                <input type='submit' name='update' value='Update Now' class='btn color-set btn-block'>

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

</body>

</html>
