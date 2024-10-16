<?php
    include_once "./connection.php";
    session_start();
     $Id=$_SESSION['ID']; 

    function after_edit(){
        header("Location: ./index.php");
    }

    if (isset($_POST['update'])) {
        # code...
        $new_username=mysqli_real_escape_string($conn,$_POST['name']);
        $new_email=mysqli_real_escape_string($conn,$_POST['email']);
        $new_pass=mysqli_real_escape_string($conn,$_POST['newPassword']);
        $user_modify=mysqli_query($conn,"UPDATE `users` SET `Username`='$new_username',`Email`='$new_email',`Password`='$new_pass' WHERE Id=$Id");
        
        if($user_modify){
            after_edit(); 
        }
    }

?>

