
    <?php
        $db = mysqli_connect("localhost","root","","Library");
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);

        
       
        session_start();
        if (!$db) {
            echo "error";
        }
        // if (count($_POST)) {
            # code...
         
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        

        

        $query="select * from users where BINARY Username='".$username."' and BINARY Password='".$password."'";

        $res=mysqli_query($db,$query);
        $user=mysqli_fetch_array($res);
                if (is_array($user)) {
                    # code...
                    $_SESSION['ID']=$user['Id'];
                    $_SESSION['name']=$user['Username'];
                    $_SESSION['email']=$user['Email'];
                    $_SESSION['CreatedAt']=$user['CreatedAt'];
                    $_SESSION['Privilages']=$user['Privilage'];
                } else {
                    # code...
                     $message= "Invalid Username or Password";
                }
                
            $result=mysqli_query($db,$query);
            $rows = mysqli_num_rows($result);

        $user_data=mysqli_fetch_array($result);


        if ($rows == 1) {
            if ($user_data) {
                # code...
                if (!empty($_POST['remember'])) {
                    # code...
                    setcookie("username",$_POST['username'],time()+(7*60*60));
                    setcookie("password",$_POST['password'],time()+(7*60*60));

                    header("Location: ./home.php");
                }
                else {       
                    if (isset($_COOKIE['username'])) {
                        # code...
                        setcookie("username","");
                        // header("Location: ./home.php");
                    }
                    if (isset($_COOKIE['password'])) {
                        # code...
                        setcookie("password","");
                        // header("Location: ./home.php");
                    }              
                    header("Location: ./home.php");
                }
                
            }
        }else{
            $message= "Invalid Username or Password";
            header("Location: ./index.php?message=Invalid Username or Password");
        }
    // }
    ?>