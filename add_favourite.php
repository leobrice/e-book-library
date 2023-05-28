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

            function after_add(){
                header("Location:./favourites.php");
                exit;
            }

            function not_add(){
                header("Location:./books.php");
                exit;
            }

            $book_Id=$_GET['Book_Id'];
            // echo $book_Id."------". $_SESSION['ID'];             //for testing
            $user_ID=$_SESSION['ID'];

                $checking_query=mysqli_query($conn,"select * from User_Favourites where Id='$user_ID' and Book_Id='$book_Id' ");

                if ($favourite_row=mysqli_num_rows($checking_query)) {
                    # code...
                        // it exist but having a status of 0 >> changing its status to 1 again
                        $adding_favourite_query=mysqli_query($conn,"UPDATE `User_Favourites`  SET `Status` = '1' WHERE Id='$user_ID' and Book_Id='$book_Id' ");


                    ?>
                    <script>
                            alert("The book has been added again");
                            window.location="./favourites.php";

                    </script>
                    <?php                  
                }else {
                    # code...
                


                $add_user_favourite=mysqli_query($conn,"INSERT INTO `User_Favourites`(`Id`, `Book_Id`) VALUES ('$user_ID','$book_Id');");

                     if ($add_user_favourite) {
                    # code...
                    after_add();
                        }

                    }

        }

?>
