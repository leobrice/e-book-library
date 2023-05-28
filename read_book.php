
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Book</title>

    <!-- Top Icon -->
    <link rel="icon" href="./assets/images/books.png" type="image/png">

</head>
<body>
    <?php
    include_once "./connection.php";
    include_once "./header.php";
    session_start();
     
     // FOR EVERY USER PAGE;
         $Id=$_SESSION['ID'];                 
            // echo $Id."ID".$_SESSION['ID'] ;
        if (!isset($_SESSION["name"])) {
            header("Location: ./index.php");
        }else{
            $user_profile_data=mysqli_query($conn,"SELECT * FROM users where Id='$Id' ");

            if (mysqli_num_rows($user_profile_data)>0) {
                    # code...
                    $user_profile_results=mysqli_fetch_assoc($user_profile_data);
                }
            elseif (mysqli_num_rows($user_profile_data)==0) {
                # code...
                session_destroy();
                session_unset();            
                header("location:index.php");
            }
        }

    $bookID=$_GET['Id'];
     $Read_book_query=mysqli_query($conn,"SELECT * FROM `Books_table` where `Book_Id`=$bookID");

      while ($Read_book_results=mysqli_fetch_array($Read_book_query)) {
            $BookPath=$Read_book_results['Path'];
            // header("Location: $BookPath");
            ?>
            <embed src="<?php echo $BookPath ?>#toolbar=0" type="application/pdf" width="100%" height="800px">
            <?php
      }

?>
</body>
<script>
    // document.getElementById("toolbarViewer").style.visibility="hidden";
    document.getElementById("download").style.visibility="hidden";
    document.getElementById("print").style.visibility="hidden";
    document.getElementById("viewBookmark").style.visibility="hidden";

</script>
</html>