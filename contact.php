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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- <link rel="icon" href="./assets/images/books.png"> -->
    <link rel="icon" href="./assets/images/books.png" type="image/png">

    <!-- Datatables -->

        <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
    <div class="container p-15">
        <div class="row">
            <div class="col-md-6">
                <form id="contactForm"  action="contact_action.php" method="POST">

                    <!-- Name Input -->
                    <div class="form-floating mb-3">                  
                      <input class="form-control" id="name" value="<?php echo $_SESSION['name'] ?>" type="text" placeholder="Username" disabled />                  
                    </div>

                    <!-- Email Input -->
                    <div class="form-floating mb-3">
                      <input class="form-control" name="subject" type="text" placeholder="Subject"  required/>                                   
                    </div>

                    <!-- Message Input -->
                    <div class="form-floating mb-3">
                      <textarea class="form-control" name="message" type="text" placeholder="Message" style="height: 10rem;" ></textarea>                    
                    </div>

                   <!-- Submit button -->
                    <div class="d-grid">
                      <button class="btn btn-outline-success" name="submitButton" type="submit">Submit</button>
                    </div>
                  </form>
                  <!-- End of contact form -->
            </div>
            <div class="col-md-6" >
            <table  class="table table-striped table-bordered" id="example">
                <!-- <caption>The Sent Info</caption> -->
          <thead class="thead">
            <tr>
                <th scope="col"> #</th>
                <th scope="col">UserId</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
            </tr>  
            <tbody>
              <?php
                   $ID=$_SESSION['ID'];
                  //  echo $ID."ER";
  
                  $message_query=mysqli_query($conn,"SELECT * FROM `Message` where `Id`='$ID'  ");
                              $count=1; 
                       while ($message_results=mysqli_fetch_array($message_query)) {
                              # code...
                      
              ?>
              <tr>
                          <td> <?php echo $count++?></td>
                          <td> <?php echo $message_results['Id']?></td>
                          <td> <?php echo $message_results['Subject']?></td>
                          <td> <?php echo $message_results['Message']?></td>
                          <td> <?php echo $message_results['Status']?></td>
                      </tr>
                      <?php
                      //                           
                          }  
                      ?>
            </tbody>
          </thead>
        </table>
            </div>
        </div>
        
    </div>
    
    
</body>
 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
   
   <script >
        $(document).ready(function () {
                $('#example').DataTable();
        });

    </script>
</html>

