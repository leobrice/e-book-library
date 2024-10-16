<?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
// header
// include_once "./includes/header.php";
      include_once "./includes/connection.php";
      session_start();
      
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Options </title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <!-- trial -->
    <link rel="stylesheet" href="./style2.css">

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
        <li class="active">
          <a href="./books.php"><i class="fa fa-book"></i>Books</a>
        </li>
        <li>
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
        .col-sm{
            padding: 4rem;
            border: 2px solid #fff;
            align-content:center;
            margin:6px;
            border-radius:10px;
            background-color:#75757585;
            
        }
        a{
          color:black;
        }
        .col-sm:hover{
          transform: scale(20px);
        }
        a:hover{
          color:Orange;

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
            <div class="col-sm-5" >
            <div class="container">
  <h2>Add Category</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Click Here!</button>
 

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="align-text:center">
            Add Book
            </h4> -->
        </div>
        <div class="modal-body">
          <p>Add Category.</p>
          <form action="" method='POST' enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for='name'>Category Name: <sup>*</sup></label>
                            <input type='text' name="Category" class='form-control form-control-lg'>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="row">
                            <div class='col'>
                                <input type='submit' id="register" name='register' value='Register' class='btn  btn-block color-set'>                                   
                            </div>
                        </div>
                    </form>
          <div class="container">

          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
      
    </div>
  </div>
  
    </div>
 
            </div>
        </div>
  <div class="container mt-5">
  <div class="row">
    <table  class="table table-striped" id="example">
       <thead class="thead-dark">
      <tr>
        <th>Category_Id</th>
      <th> Category Name</th>
      <th> Created Date</th>
      </tr>
      <tbody>
          <?php
                $category_query=mysqli_query($conn,"SELECT * FROM `Category`");
                  while($category_row=mysqli_fetch_array($category_query)){
                    ?>
                    <tr>
                        <td> <?php echo $category_row['Category_Id']?></td>
                        <td> <?php echo $category_row['Name']?></td>
                        <td> <?php echo $category_row['CreatedAt']?></td>
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
<?php
    if (isset($_POST['register'])) {
      # code...
      $cat_name=$_POST['Category'];

      $insert_cat=mysqli_query($conn,"INSERT INTO `Category`(`Name`) VALUES ('$cat_name')");
      if ($insert_cat) {
        # code...
        // header("Location:./category.php");      
      }
    }
?>
</html>