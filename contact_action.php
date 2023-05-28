<?php
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

         $Id=$_SESSION['ID']; 
        //     $row=mysqli_fetch_array($query);
        
            // echo $Id."ID".$_SESSION['ID'] ;
        if (!isset($_SESSION["name"])) {
            header("Location: ./index.php");
        }

        if (isset($_POST['submitButton'])) {
            # code...
            $user_ID=$_SESSION['ID'];
            $user_subject=mysqli_real_escape_string($conn,$_POST['subject']);
            $user_message=mysqli_real_escape_string($conn,$_POST['message']);

            $message_query=mysqli_query($conn,"INSERT INTO `Message`(`Id`, `Subject`, `Message`) 
            VALUES ('$user_ID','$user_subject','$user_message')");

            if ($message_query) {
                # code...
                header("Location:./contact.php");
            }
            else{
                echo"error";
            }

        }


?>