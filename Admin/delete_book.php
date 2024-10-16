<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(E_ALL);



          //  NOT USED


    include_once "./includes/connection.php";
    session_start();
  function after_delete(){
    header("Location:./BooksList.php");
  }
    $book_Id=$_GET['Id'];
    // echo "...".$book_Id;
     $book_query=mysqli_query($conn,"SELECT * FROM `Books_table` where Book_Id=$book_Id");
     $book_result=mysqli_fetch_array($book_query);
     
     $image_path=$book_result['Image'];
     $real_image_path=".".$image_path;

     $pdf_path=$book_result['Path'];
     $real_pdf_path=".".$pdf_path;
    echo "Image >>".$real_image_path."<br>"."Pdf".$real_pdf_path;

    // delete from favourites

     $user_fav=mysqli_query($conn,"DELETE FROM User_Favourites WHERE Book_Id=$book_Id");
    // delete from books table
    $book_delete=mysqli_query($conn,"DELETE FROM `Books_table` WHERE ((`Book_Id` = '$book_Id'));");
    if (!$book_delete) {
      # code...
           }
    else {
      unlink($real_image_path);
      unlink($real_pdf_path);
      after_delete();
    }

?>
