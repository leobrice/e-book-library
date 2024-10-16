<?php
        include_once "./header.php";
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
        }else{

         

            $book_Id=$_GET['Book_Id'];
            // echo $book_Id."------". $_SESSION['ID'];             //for testing
            $user_ID=$_SESSION['ID'];
                                    //  UPDATE `User_Favourites`  SET `Status` = '0' WHERE `Id` = '4' and `Book_Id`='27';
                $checking_query=mysqli_query($conn,"UPDATE `User_Favourites`  SET `Status` = '0' WHERE Id='$user_ID' and Book_Id='$book_Id' ");

                if ($checking_query) {
                    # code...                    
                    ?>
                    <script>
                            alert("The book has been removed");
                            window.location="./favourites.php";

                    </script>
                    <?php                  
                }else {
                    # code...
                    ?>
                    <script>
                            // alert("The book has been removed");
                            window.location="./favourites.php";

                    </script>
                    <?php               

                    }

        }

?>
