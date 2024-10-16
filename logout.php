<?php
    session_start();

        if(isset($_GET['logout'])){
            session_destroy();
            session_unset();
            // session_destroy();
            header("location:index.php");
        }
        else{
            session_destroy();
            session_unset();
            header("location:index.php");
        }

   
?>