<?php    
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);

        include_once "./includes/connection.php";
         session_start();

          $id=$_SESSION['ID'];
        // echo "..-->".$_SESSION['Admin_Privilages']."<<---".$_SESSION['name'];


        
                // For Removing Tresspassed Normal User
      if ($_SESSION['Admin_Privilages'] == NULL ) {
          # code...
            session_destroy();
            session_unset();            
            header("location:index.php");
        }

        
        if (!isset($_SESSION["name"])) {
            header("Location: ./index.php");
        }
        else{
            
            $admin_profile_data=mysqli_query($conn,"SELECT * FROM `Admin` where Admin_Id ='$id' ;");
                if (mysqli_num_rows($admin_profile_data)>0) {
                    # code...
                    $admin_profile_results=mysqli_fetch_assoc($admin_profile_data);
                }
            }        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <!-- <link rel="stylesheet" href="./style.css"> -->
    
    <!-- Top Icon -->
    <link rel="icon" href="../assets/images/books.png" type="image/png">

</head>
<body>
   <div id="wrapper">

  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <!-- <h2>Logo</h2> -->
      <img src="../assets/images/books.png" alt="" srcset="" width="30" style="margin-left: -65px;" ><span style="color:white;margin:3px;font: size 20px;margin-left: 15px;" >Online Library</span>
    </div>
    <ul class="sidebar-nav">
        <li >
          <a href="./dashboard.php"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
          <a href="./books.php"><i class="fa fa-book"></i>Books</a>
        </li>
        <li>
          <a href="./users.php"><i class="fa fa-group"></i>Users</a>
        </li>      
        <li class="active">
          <a href="./profile.php"><i class="fa fa-user"></i>Profile</a>
        </li>
        <li>
          <a href="./message.php"><i class="fa fa-envelope"></i>Messages</a>
        </li>
        <li>
          <a href="./favourites.php"><i class="fa fa-star"></i>Favourites</a>
        </li>
      </ul>
  </aside>
<style>
        div .navbar-header{            
            display:flexbox ;
            justify-content: flex-end;
            align-items: flex-end;
        }

</style>
  <div id="navbar-wrapper">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <div>
                <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="items-end"> 
        <a href="../logout.php?logout" >Exit <i class="fa fa-power-off"></i></a>
        </div>
      </div>
    </nav>
    </div>
    <!--    Space between -->
    <nav class="navbar navbar-expand-md navbar-dark mb-3 navbar-custom">

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <!-- <a class="nav-link" href="dashboard.php">Home </a> -->
                    </li>
                </ul>

            </div>
        </div>
    </nav>
<!-- ############################ Change Here  ######################################## -->

<div class="container">

<div class='jumbotron jumbotron-fluid text-center color-set'>
    <div class="container">
        <h1 class='display-3'>
            Manage Your Profile
        </h1>
        <p class='lead'>
            Here you will be able to upload image and edit information
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
                        <label for="name"><strong>Id:</strong></label>
                        <span class='text-data'> <?php   echo $admin_profile_results['Admin_Id'] ;  ?></span>
                    </div>

                    <div class='detail-text'>
                        <label for="name"><strong>Name:</strong></label>
                        <span class='text-data'> <?php  echo $admin_profile_results['Username'];  ?></span>
                    </div>

                    <div class='detail-text'>
                        <label for="name"><strong>Email:</strong></label>
                        <span class='text-data'><?php  echo $admin_profile_results['Email']; ?></span>
                    </div>

                    <div class='detail-text'>
                        <label for="name"><strong>Account Status:</strong></label>
                        <span class='text-data'> Verified</span>
                    </div>

                    <hr/>
                    <div class='detail-text'>
                        <label for="name"><strong>Created at:</strong></label>
                        <span class='text-data'><?php echo $admin_profile_results['CreatedAt']; ?></span>
                    </div>

                </div>
                <div class="col-md-4">

                    <a href="https://placeholder.com"><img src=""  alt="" srcset=""></a>

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

<!-- ############################ Change Here  ######################################## -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


    <!--CUSTOM JS-->
    <script src="assets/js/script.js"></script>

</div>
</body>
<script>
    const $button  = document.querySelector('#sidebar-toggle');
      const $wrapper = document.querySelector('#wrapper');
         
        $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
    });
</script>
</html>