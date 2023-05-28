<?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);

    include_once "./includes/connection.php";
    session_start();
    

    if (isset($_POST['login'])) {
        # code...
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=mysqli_real_escape_string($conn, $_POST['password']);


         $checking_query="select * from Admin where BINARY Username='".$username."' and BINARY Password='".$password."' limit 1";

        $results_query=mysqli_query($conn,$checking_query);

        $output_query=mysqli_num_rows($results_query);

        if ($output_query==1) {
            # code...
                $user_details=mysqli_fetch_array($results_query);
                if (is_array($user_details)) {
                    # code...
                    $_SESSION['ID']=$user_details['Admin_Id'];
                    $_SESSION['name']=$user_details['Username'];
                    $_SESSION['email']=$user_details['Email'];
                    $_SESSION['CreatedAt']=$user_details['CreatedAt'];
                    $_SESSION['Admin_Privilages']=$user_details['Privilage'];
                    // echo $_SESSION['name']."<br>".$_SESSION['email'];
                    // echo "Welcome"."<br>".$_SESSION['ID'];

                    header("Location:./dashboard.php");

                } else {
                    # code...
                     $message= "Invalid Username or Password";
                }

        }else {
            header("Location: ./index.php?message=Invalid Username or Password");
        }

    }

?>