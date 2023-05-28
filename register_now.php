<?php


        include_once "./connection.php";
       function after_register(){
                    header("Location: ./index.php");
                }
        if(isset($_POST['register'])){
                
                $username=$_POST['username'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $confirm_password=$_POST['confirm_password'];
                $verify_token=md5(rand());
                
            

                          
                // Repetition of column
                // $select=mysqli_query("$conn","select * from  `users` where `Name`=`$name`  AND `Email`=`$email` AND `Password`=`$password`") ;
                // $num_row=mysqli_num_row($select);
                // checking number of rows
                // if($num_row){
            // echo "<script>".alert("user exists");"</script>";
        // }else{

            #commented friday

            if($password != $confirm_password){
                header("Location: ./register.php?ErrorPassword=Password not matched");
                echo "password not matched";
                //  echo "<script>".alert("Password not matched");"</script>";
            }else{
                if($password!='' && $username!=''){
                    $query="INSERT INTO `users` (`Username`, `Email`, `Password`,`token`) VALUES ('$username', '$email', '$password','$verify_token');";
                    $result=mysqli_query($conn,$query);
                        
                    if ($result) {
                     after_register();
                    }
                    
                        // if ($query) {
                        //     # code...
                        //       echo '<script>'.alert("Register Succesfully");'</script>';
                        // }
                }
            }
        }

?>