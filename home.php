<?php
        include_once "./header.php";
        include_once "./connection.php";
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
     

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
    <title>Home</title>

    <!-- <link rel="icon" href="./assets/images/books.png"> -->
    <link rel="icon" href="./assets/images/books.png" type="image/png">

    <style>
        div .navbar-header{            
            display:flexbox ;
            justify-content: flex-end;
            align-items: flex-end;
        }
                .col-sm{
            padding: 6rem;
            border: 2px solid #fff;
            align-content:center;
            margin:6px;
            border-radius:10px;
            background-color:#bdcda7;;
        }
        a{
          color:black;

        }
        .col-sm:hover{
          color:Orange;
          transform: scale(20px);
        }
        a:hover{
          color:Orange;

        }


</style>
</head>
<body>
        <div class="container pt-5 " >
          <div class="row well pt-5">
              <div class="col-sm"> <a href="./books.php"> <i class="fa fa-book fa-5x"></i> </a></div>
              <div class="col-sm"> <a href="./profile.php"> <i class="fa fa-user fa-5x"></i></a></div>
              <div class="col-sm"> <a href="./contact.php"> <i class="fa fa-envelope fa-5x"></a></i></div>
              <div class="col-sm"> <a href="./favourites.php"> <i class="fa fa-star fa-5x"> </i></a> </div>
          </div>
          <div class="row" >
              <div class="col-sm" style="color:red">  
              <div>
               <!-- <i class="fa fa-quote-left" aria-hidden="true"></i> -->
                <span class="author" id="author">-Walt Disney</span>
                 <!-- <i class="fa fa-quote-right" aria-hidden="true"></i> -->
               </div>
               <div>
                <p id="qoute-text">The way to get started is to quit talking and being doing</p>                
              </div>
                <div class="div">
                  <button type="submit" class="btn btn-outline-success" id="new-quote" onclick="window.location.reload()">New Quote</button>
                </div>
              </div>
              <div class="col-sm">  <a href="recent.php"><i class="fa fa-clock-o fa-5x"></i></a></div>
          </div>     

        </div>
    
</body>
<script>
            // JSON READING mode.json FILE
        
        // document.getElementById("new-quote").onclick=window.location.reload();

        var online_url_endpoint="https://type.fit/api/quotes";         //online data
        var offline_file_endpoint="mode.json";                          //offline local file

          fetch(offline_file_endpoint)
                .then(response => response.json())
                .then(data =>   { 
                    // console.log(data)[1].author
                    var rand=Math.floor((Math.random()*1642) + 1);
					document.getElementById("author").innerHTML=data[rand].author;
					document.getElementById("qoute-text").innerHTML=data[rand].text;
                    console.log (rand);
                    console.log(data[rand]);
})          
        // disabled right click        
        document.addEventListener('contextmenu',(e) =>e.preventDefault());

    </script>
</html>