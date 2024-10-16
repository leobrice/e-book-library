<?php
include_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.css" >
    <!--Font awesome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./assets/css/style2.css"> -->
    <!-- trial -->
    <link rel="stylesheet" href="./Admin/assets/css/style2.css">
    
    <!-- <link rel="icon" href="./assets/images/books.png"> -->
    <link rel="icon" href="./assets/images/books.png" type="image/png">

    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>



</head>
<body>
   <div id="wrapper">

  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <!-- <h2>Logo</h2> -->
      <!-- <img src="./assets/images/books.png" alt="" srcset="" width="30" ><span style="color:white;margin:3px;font: size 20px;" >Online Library</span> -->
      <img src="./assets/images/books.png" alt="" srcset="" width="30" style="margin-left: -65px;" ><span style="color:white;margin:3px;font: size 20px;margin-left: 15px;" >Online Library</span>
    </div>
    <ul class="sidebar-nav">
        <li>
            <img src="./assets/images/books.png" alt="" srcset="" width="30" ><span style="color:white;margin:3px;font: size 20px;" >Online Library</span>
            <br>
        </li>
        <li class="active">
          <a href="./dashboard.php"><i class="fa fa-home"></i>Home</a>
          <!-- <img src="./assets/images/books.png" alt="" srcset="" width="30" ><span style="color:white;margin:3px;font: size 20px;margin-left: 27px;" >Online Library</span> -->
        
        </li>
        <li>
          <a href="./books.php"><i class="fa fa-book"></i>Books</a>
        </li>
        <li>
          <a href="./users.php"><i class="fa fa-group"></i>Users</a>
        </li>      
        <li>
          <a href="./profile.php"><i class="fa fa-user"></i>Profile</a>
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
        <a href="#" >Exit <i class="fa fa-power-off"></i></a>
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
<!-- ############################ Start  Change Here  ######################################## -->

<div class="container">
<div class="col-sm">
<div class="container">
        <table  class="table table-striped datatable-1" id="example">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> #</th>
                    <th scope="col">BookID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>	        
	                <th scope="col">AddedAt</th>
                    <th scope="col">Read</th>
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
                                <td> <?php echo "Book/0".$book_results['Book_Id']?></td>
                                <td> <?php echo $book_results['Name']?></td>
                                <td> <?php echo $book_results['Author']?></td>                       
                                <td> <?php echo $book_results['CreatedAt']?></td>
                                <td> 
                                    <a href="read_book.php?Id=<?php echo $book_results['Book_Id'] ?>"> 
                                    <button type="button btn-sm" name="success" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal" <?php echo $book_results['Book_Id'] ?>>Read</button>
                                    </a>
                                    <!-- <button type="button btn-sm" class="btn btn-danger">Delete</button> -->
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

<!-- ############################ End    Change Here  ######################################## -->


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