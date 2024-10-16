<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(E_ALL);


    include_once "./includes/connection.php";


    function after_submit(){
        header("Location: ./dashboard.php ");
    }

    if (isset($_POST["register"])) {
      // Get form data and sanitize using mysqli_real_escape_string to prevent SQL injection
      $book_Name = mysqli_real_escape_string($conn, $_POST['bookName']);
      $book_author = mysqli_real_escape_string($conn, $_POST['author']);
      $book_category_Id = mysqli_real_escape_string($conn, $_POST['category']);
      
      // Details about the PDF file
      $filename = str_replace(' ', '', $_FILES['fileToUpload']['name']); // filename without spaces
      $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
      $target_dir = '../assets/books/' . $filename;  // Path to store PDF
      $target_path = './assets/books/' . $filename;  // Path for database (reading the file)
      
      // Details about the book image
      $image_name = str_replace(' ', '', $_FILES['bookImage']['name']); // filename without spaces
      $imageTmpPath = $_FILES['bookImage']['tmp_name'];
      $image_dir = '../assets/images/' . $image_name;   // Path to store the image
      $image_path = './assets/images/' . $image_name;   // Path for database (reading the image)
  
      // Ensure files were uploaded before proceeding
      if (is_uploaded_file($fileTmpPath) && is_uploaded_file($imageTmpPath)) {
          // Insert data into the database using a prepared statement for better security
          $stmt = $conn->prepare("INSERT INTO `Books_table` (`Name`, `Category_Id`, `Author`, `Image`, `Path`) VALUES (?, ?, ?, ?, ?)");
          $stmt->bind_param("sisss", $book_Name, $book_category_Id, $book_author, $image_path, $target_path);
          
          if ($stmt->execute()) {
              // Move the uploaded files to their respective directories
              if (move_uploaded_file($fileTmpPath, $target_dir) && move_uploaded_file($imageTmpPath, $image_dir)) {
                  // After successful submission and file upload
                  after_submit();
              } else {
                  echo "Failed to move uploaded files.";
              }
          } else {
              // If the query fails, output the error
              echo "Error: " . $stmt->error;
          }
          
          // Close the statement
          $stmt->close();
      } else {
          // Error handling for file upload failure
          echo "Failed to upload one or both files.";
      }
  }
  

?>