<?php
 include_once "./includes/connection.php";
    
    session_start();
     if (!isset($_SESSION["name"])) {
            header("Location: ./index.php");
        }
                      // For Removing Tresspassed Normal User
      if ($_SESSION['Admin_Privilages'] == NULL ) {
          # code...
            session_destroy();
            session_unset();            
            header("location:index.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <!-- trial -->
    <link rel="stylesheet" href="./style2.css">

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
        <li class="active">
          <a href="./users.php"><i class="fa fa-group"></i>Users</a>
        </li>      
        <li>
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

        <div class="row">

            <div class="col-md-6 mx-auto">
                <div class='card card-body  bg-light mt-5'>

                    <h2>Update Your account Details <?php echo $id."ser"; ?></h2>
                    <p>
                       

                    </p>
                    <script>
                            // console.log "<?php echo $id ; ?>"."dew";
                    </script>
            <?php       
                        // echo intval($_GET['Id']);
                    
                       $id=$_SESSION['id']; 
        //     $row=mysqli_fetch_array($query);
                    $id=intval($_GET['Id']);
        


                    $user_data=mysqli_query($conn,"SELECT * FROM users where Id='$id'") or die(mysqli_error());
                    if (mysqli_num_rows($user_data)>0) {
                        # code...
                        $user_results=mysqli_fetch_assoc($user_data);
                    }
            ?>
                    <form action="" method='POST'>
                    
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



<!-- ############################ Change Here  ######################################## -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


    <!--CUSTOM JS-->
    <script src="assets/js/script.js"></script>

</div>
</body>
<?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
    
   
    //  $Id=$_SESSION['ID']; 

    // function changePage(){
    //     header("Location: ./users.php");
    // }

    if (isset($_POST['update'])) {
        # code...
         $id=intval($_GET['Id']);
        $new_username=mysqli_real_escape_string($conn,$_POST['name']);
        $new_email=mysqli_real_escape_string($conn,$_POST['email']);
        $new_pass=mysqli_real_escape_string($conn,$_POST['newPassword']);
        $user_modify=mysqli_query($conn,"UPDATE `users` SET `Username`='$new_username',`Email`='$new_email',`Password`='$new_pass' WHERE Id=$id");
        
        if($user_modify){
            // header("Location: ./dashboard.php");
            ?>
                <script>
                    alert("The user is Succesfully edited");
                    window.location="./users.php";
                </script>
            <?php
        }
        else{

        }
    }


    
    
?>


<script>
    const $button  = document.querySelector('#sidebar-toggle');
      const $wrapper = document.querySelector('#wrapper');
         
        $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
    });
</script>
</html>