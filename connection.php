<?php

//connection with the database 
            //   PDO WORKS ;
    // $pdo= new PDO('mysql:host=localhost;port=3306;dbname=Library',"root","");
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $statement=$pdo->prepare('select * from  book1');
   	// $statement->execute();
	// $book1 =$statement->fetchAll(PDO::FETCH_ASSOC);     
	 
               //PREFERING Mysqli-Object-Oriented

        $servername = "localhost";
		$username = "root";
		$password = "";
		$db="Library";

		// Create connection
    		$conn = mysqli_connect($servername, $username, $password,$db);

		// Check connection
    		if (!$conn) {
		          die("Connection failed: " . mysqli_connect_error());
		            }
             //       validating connection
		    // echo "Connected successfully";

// Check connection
    // if (mysqli_connect_error()) {
    //         echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //         echo("hello2");
    //         exit();
            
        else{
            // echo("Database connected succesfully");
        }

            // echo'<pre>';
            // var_dump($book1);
            // echo'</pre>';
            
            // echo "Connection Succesfully";
?>
