<?php

    // include_once "./includes/header.php";
    include_once "./includes/connection.php";
    session_start();
    // echo "$Id";

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
    <title>Users</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./style2.css"> -->
    <link rel="stylesheet" href="./assets/css/style2.css">

    <!-- Top Icon -->
    <link rel="icon" href="../assets/images/books.png" type="image/png">


    <!-- Datatables -->
        <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


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
        <div class="top" style="text-align:center;">
         <h2>All users</h2>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-striped table-dark table-bordered" id="example">
                <thead class="thead-light">
                    <tr>
                      <th scope="col"> #</th>
                      <th scope="col">User_ID</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
	                  <th scope="col">Joined Date</th>
	                  <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>               
                </thead>
                <tbody>
                    <?php
                            $users_query=mysqli_query($conn,"SELECT * FROM `users` LIMIT 50");
                                $count=1;
                           while ($users_results=mysqli_fetch_array($users_query)) {
                            # code...
                           
                    ?>
                    <tr>
                        <td> <?php echo $count++?></td>
                        <td> <?php echo "user/0".$users_results['Id']?></td>
                        <td> <?php echo $users_results['Username']?></td>
                        <td> <?php echo $users_results['Email']?></td>
                        <td> <?php echo $users_results['CreatedAt']?></td>
                        <td> 
                            <!-- <form action="" method="POST"> -->
                                <a href="manage-users.php?Id=<?php echo $users_results['Id'] ?>">
                                     <button type="button btn-sm" name="edit" class="btn btn-info">Edit</button>
                                </a>
                        </td>
                        <td>
                                    <a href="delete_user.php?Id=<?php echo $users_results['Id'] ?>">
                                    <button type="button btn-sm" class="btn btn-danger" name="delete">Delete</button>
                                </a>
                            <!-- </form> -->
                        </td>
                    </tr>
                    <?php                           
                        }                         
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

<!-- ############################ Change Here  ######################################## -->

      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">                   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


    <!--CUSTOM JS-->
    <script src="assets/js/script.js"></script>

</div>
</body>
    <script >
        $(document).ready(function () {
                $('#example').DataTable();
        });

    </script>
<script>
    const $button  = document.querySelector('#sidebar-toggle');
      const $wrapper = document.querySelector('#wrapper');
         
        $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
    });
</script>
</html>