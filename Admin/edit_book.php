<?php
        include_once "./includes/connection.php";
        
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
        
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
    <title>Document</title>

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
<!-- ############################ Start  Change Here  ######################################## -->
        <!-- Modal Content -->
        <?php
                $book_Id=$_GET['Id'];
                //Testing
                // echo $book_Id;

                $book_edit_query=mysqli_query($conn,"SELECT * FROM `Books_table` where `Book_Id`=$book_Id");
                    if (mysqli_num_rows($book_edit_query)>0) {
                        # code...
                        $book_results=mysqli_fetch_assoc($book_edit_query);
                    }                
        ?>      
                <div class="container">
                    <div class="col-sm-10 ">                                          
                        <form action="" method='POST' enctype="multipart/form-data">
                                  <div class="form-group">
                                      <?php  // echo intval($GET['Book_Id']);  ?>
                                      <label for='name'>Book Id: </label>
                                      <input type='text' name="BookId" value="<?php   echo $book_results['Book_Id']  ?>" class='form-control form-control-lg' disabled>
                                      <span class="invalid-feedback"></span>
                                  </div>
                                  <div class="form-group">
                                      <?php  // echo intval($GET['Book_Id']);  ?>
                                      <label for='name'>Book Name: </label>
                                      <input type='text' name="bookName" value="<?php   echo $book_results['Name']  ?>" class='form-control form-control-lg'>
                                      <span class="invalid-feedback"></span>
                                  </div>
                                  <div class="form-group">
                                      <label for='name'>Author: </label>
                                      <input type='text' name="author" value="<?php   echo $book_results['Author']  ?>"  class='form-control form-control-lg'>
                                      <span class="invalid-feedback"></span>
                                  </div>
                                  <div class="form-group">
                                      <label for='email'>Cover Image: </label>
                                      <img class="form-group" src="<?php   echo ".".$book_results['Image'];  ?>" width="100" alt="" srcset="">
                                       <?php echo "Path"."   ".$book_results['Image']; ?>
                                      <input type='file' name="bookImage" class='form-control form-control-lg' accept="image/*" >
                                      <span class="invalid-feedback"></span>
                                  </div>
                                    <div class="form-group">
                                      <label for="exampleInputFile">Enter Pdf :</label>
                                      <input type="file" name="fileToUpload" id="exampleInputFile"  accept=".pdf">
                                    </div>
                                  <div class="row">
                                      <div class='col'>
                                        
                                              <input type='submit' id="update" name='update' value='Update' class='btn  btn-block color-set'>
                                           
                                            <script>
                                            </script>
                                      </div>
                                  </div>
                        </form>
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
<?php // for the form 
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(E_ALL);
    // echo "...".$book_Id;
    function after_submit(){
        header("Location: ./dashboard.php ");
    }
        // Check if image file is a actual image or fake image
        if(isset($_POST["update"])) {
             $book_Id=intval($_GET['Id']);

            $book_Name=mysqli_real_escape_string($conn,$_POST['bookName']);
            $book_author=mysqli_real_escape_string($conn,$_POST['author']);
            // $book_image=$_FILES["bookImage"]['name'];

            //Details About the Pdf file;
                $filename=$_FILES['fileToUpload']['name'];
                $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];

                //filename without space;
                $filename_nospace=str_replace(' ','',$filename);

                $target_dir = '../assets/books/'.$filename_nospace ;                //for moving towards location (path for writing)
                $target_path='./assets/books/'.$filename_nospace;                   //for database correct path (path for reading)

                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            //Detaile for the Book image
              $imageTmpPath=$_FILES['bookImage']['tmp_name'];
              
              $image_name=str_replace(' ','',$_FILES['bookImage']['name']);         //without space
              $image_directory="../assets/images/";                                 //image directory from this current file

              $image_dir=$image_directory.$image_name;                              // path for writing
              $image_path="./assets/images/".$image_name;                           // path for reading file

              $image_target_file = $image_dir . basename($_FILES["bookImage"]["name"]);
                $uploadOk = 1;


            // query to insert data from the form
            // UPDATE `Books_table` SET `Book_Id`='[value-1]',`Name`='$book_Name',`Category_Id`='[value-3]',`Author`='$book_author',`Image`='$image_path',`Path`='$target_path' WHERE Book_Id=$book_Id
            // $add_book="INSERT INTO `Books_table`(`Name`, `Author`, `Image`, `Path`) VALUES ('$book_Name','$book_author','$image_path','$target_path')";
            $add_book=" UPDATE `Books_table` SET `Name`='$book_Name',`Author`='$book_author',`Image`='$image_path',`Path`='$target_path' WHERE Book_Id=$book_Id";
            $bookQuery=mysqli_query($conn,$add_book);
              // after updating the data 
            if ($bookQuery) {
              # code...
              // move_uploaded_files();
              move_uploaded_file($fileTmpPath,$target_dir);                         //for moving PDF
              move_uploaded_file($imageTmpPath,$image_dir);                         //for moving pictures
              after_submit();
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
