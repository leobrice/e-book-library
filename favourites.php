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
        
            // echo $Id."ID".$_SESSION['ID'] ;
        if (!isset($_SESSION["name"])) {
            header("Location: ./index.php");
        }else{

          
            $user_profile_data=mysqli_query($conn,"SELECT * FROM users where Id='$Id' ");

            if (mysqli_num_rows($user_profile_data)>0) {
                    # code...
                    $user_profile_results=mysqli_fetch_assoc($user_profile_data);
                }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourites Page</title>

    <style>
        div .navbar-header{            
            display:flexbox ;
            justify-content: flex-end;
            align-items: flex-end;
        }
                .col-sm{
            padding: 6rem;
            border: 2px solid #fff;
            align-content:center;
            margin:6px;
            border-radius:10px;
            background-color:#bdcda7;;
        }
        a{
          color:black;

        }
        .col-sm:hover{
          color:Orange;
          transform: scale(20px);
        }
        a:hover{
          color:Orange;

        }

    </style>
</head>

       <!-- <link rel="icon" href="./assets/images/books.png"> -->
        <link rel="icon" href="./assets/images/books.png" type="image/png">


    <!-- Datatables -->

        <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<body>

<div class="container pt-5 ">
    <table  class="table table-striped table-bordered" id="example">
        <thead class="thead">
            <tr>
                <th scope="col"> #</th>                               
                <th scope="col">Image</th>
                <th scope="col">Book Name</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Remove</th>
                <th scope="col">Read</th>
                
            </tr>  
            <tbody>
                <?php
                            $user_ID=$_SESSION['ID'];
                    $favourites_query=mysqli_query($conn,"SELECT * FROM `Favourites_view` where `Id`='$user_ID' and `Status`=1");
                                $count=1;
                         while ($favourites_results=mysqli_fetch_array($favourites_query)) {
                                # code...

                ?>
                <tr>
                            <td> <?php echo $count++?></td>                                                       
                            <td class="center" width="300"> <img src="<?php echo $favourites_results['Image']?>" alt="" width=75 srcset=""> </td>
                            <td> <?php echo $favourites_results['Name']?></td>
                            <td> <?php echo $favourites_results['Category_Name']?></td>
                            <td> <?php echo $favourites_results['Author']?></td>
                            <td>     <a href="remove_favourite.php?Book_Id=<?php echo $favourites_results['Book_Id'] ?>"><i class="fa fa-times"></i></a> </td>
                            <td> 
                                <a href="read_book.php?Id=<?php echo $favourites_results['Book_Id'] ?>"> 
                                <button type="button btn-sm" name="success" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal" <?php echo $favourites_results['Book_Id'] ?>>Read</button>
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
</html>