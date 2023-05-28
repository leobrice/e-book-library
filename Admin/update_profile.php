<?php
    include_once "./includes/connection.php";
    session_start();
    $id=$_SESSION['ID'];


    if (isset($_POST['edit'])) {
        # code...
        $Admin_Username=$_POST['name'];
        $Admin_Email=$_POST['email'];
        $Admin_Password=$_POST['newPassword'];
        $update_query="UPDATE `Admin` SET `Username`='$Admin_Username',`Email`='$Admin_Email',`Password`='$Admin_Password' WHERE Admin_Id = '$id' ";

        $results=mysqli_query($conn,$update_query);
        if ($results) {
            # code...
            header("Location:./profile.php");
        }
    }
?>