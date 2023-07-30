<?php 

  // Start the session and set the user information
  session_start();
  $_SESSION['UserID'] = $row['UserID'];
  $_SESSION['UserName'] = $row['UserName'];

  // Redirect the user to the index page with a success message
  header("Location: index.php?Signup=Success");
  exit();



  

