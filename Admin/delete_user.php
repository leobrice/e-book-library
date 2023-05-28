<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(E_ALL);

    include_once "./includes/connection.php";
    
    //AFTER DELETE
    function after_delete(){
        header("Location: ./users.php");
    }

    $user_Id=$_GET['Id'];
    // echo "Id=".$user_Id;
 

    // DELETE AT MESSAGES TABLE
    $user_messages=mysqli_query($conn,"DELETE FROM `Message` WHERE Id=$user_Id");

    //DELETE AT FAVOURITES TABLE
    $user_favourites=mysqli_query($conn,"DELETE FROM `User_Favourites` WHERE Id=$user_Id");
    
    //DELETE AT USER TABLE
    $user_data=mysqli_query($conn,"DELETE FROM `users` WHERE ((`Id` = '$user_Id'));") ;
    
    if ($user_data) {
        # code...
        after_delete();
    }

?>                        