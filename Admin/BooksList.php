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
    <title>Book List</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <!-- trial -->
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    
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

</style>
  <div id="navbar-wrapper" >
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

<div class="container-fluid ">
  <div class="row">
    <div class="col-12">
        <table  class="table table-striped table-dark table-bordered mt-5" id="example">
        <thead class="thead-light">
            <tr>
              <th scope="col"> #</th>
              <th scope="col">Image</th>
              <th scope="col">BookID</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Author</th>
              <th scope="col">ImagePath</th>   
	            <th scope="col">Path</th>
	            <th scope="col">AddedAt</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>  
        <tbody>
            <?php 
                $book_query=mysqli_query($conn,"SELECT * FROM `Books_table` LIMIT 50");
                            $count=1;
                     while ($book_results=mysqli_fetch_array($book_query)) {
                            # code...

            ?>
            <tr>
                        <td> <?php echo $count++?></td>
                        <td class="center" width="300"> <img src="<?php echo ".".$book_results['Image']?>" alt="" width=75 srcset=""> </td>  
                        <td> <?php echo "Book/0".$book_results['Book_Id']?></td>
                        <td> <?php echo $book_results['Name']?></td>                        
                        <td> <?php echo $book_results['Category_Id']?></td>
                        <td> <?php echo $book_results['Author']?></td>
                        <td> <?php echo $book_results['Image']?></td>
                        <td> <?php echo $book_results['Path']?></td>
                        <td> <?php echo $book_results['CreatedAt']?></td>
                        <td> 
                            <a href="edit_book.php?Id=<?php echo $book_results['Book_Id'] ?>"> 
                              <button type="button btn-sm" name="edit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" <?php echo $book_results['Book_Id'] ?>>Edit</button>
                            </a>
                        </td>
                        <td>
                            <a href="delete_book.php?Id=<?php echo $book_results['Book_Id'] ?>"> 
                              <button type="button btn-sm" class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    //                           
                        }  
                    ?>
        </tbody>
        </thead>
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
 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
   
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