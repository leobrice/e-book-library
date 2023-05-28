<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(E_ALL);


    include_once "./includes/connection.php";


    function after_submit(){
        header("Location: ./dashboard.php ");
    }

 
        // Check if image file is a actual image or fake image
        if(isset($_POST["register"])) {
            $book_Name=mysqli_real_escape_string($conn,$_POST['bookName']);
            $book_author=mysqli_real_escape_string($conn,$_POST['author']);
            $book_category_Id=mysqli_real_escape_string($conn,$_POST['category']);

            // $book_image=$_FILES["bookImage"]['name'];

            //Details About the Pdf file;
                $filename=$_FILES['fileToUpload']['name'];
                $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];

                //filename without space;
                $filename_nospace=str_replace(' ','',$filename);

                $target_dir = '../assets/books/'.$filename_nospace ; //for moving towards location (path for writing)
                $target_path='./assets/books/'.$filename_nospace;    //for database correct path (path for reading)

                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            //Detaile for the Book image
              $imageTmpPath=$_FILES['bookImage']['tmp_name'];
              
              $image_name=str_replace(' ','',$_FILES['bookImage']['name']); //without space
              $image_directory="../assets/images/";                                //image directory from this current file

              $image_dir=$image_directory.$image_name;                       // path for writing
              $image_path="./assets/images/".$image_name;               // path for reading file

              $image_target_file = $image_dir . basename($_FILES["bookImage"]["name"]);
                $uploadOk = 1;



              //query to insert data from the form

            // $add_book="INSERT INTO `Books_table`(`Name`,`Category_Id`, `Author`, `Image`, `Path`) VALUES 
            //                             ('$book_Name','$book_category_Id','$book_author','$image_path','$target_path')";

            $add_book="INSERT INTO `Books_table`(`Name`, `Category_Id`, `Author`, `Image`, `Path`) VALUES 
                                    ('$book_Name','$book_category_Id','$book_author','$image_path','$target_path')";
            $bookQuery=mysqli_query($conn,$add_book);

            if ($bookQuery) {
              # code...
              // move_uploaded_files();
              move_uploaded_file($fileTmpPath,$target_dir);     //for moving PDF
              move_uploaded_file($imageTmpPath,$image_dir);
              after_submit();
            }
            else {
              
               echo $bookQuery;
            }
         }        

?>