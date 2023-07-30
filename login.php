<?php
session_start();
// Check if the form has been submitted
if(isset($_POST['Has-Logedin'])) {

     // Connect to the database
     require 'dbh.inc.php';

     // Get the entered username and password
     $aUserName = $_POST['aUserName'];
     $aPassword = $_POST['pwd'];

     // Check if either field is empty
     if (empty($aUserName) || empty($aPassword)) {
         // Redirect the user to the signup page with an error message
        header("Location:Signin.php?error=empityfield");
         exit();
     } else {
        // Prepare the SQL query
        $sql = "SELECT * FROM usersignup WHERE UserName =? OR userEmail=?;";
        $stmt = mysqli_stmt_init($conn);

        // Check if the query preparation fails
        if (!mysqli_stmt_prepare($stmt , $sql)) {
            // Redirect the user to the signup page with an error message
            header("Location: Signup.php?error=sqlerror");
            exit();
        } else {
              // Bind the parameters to the query
             mysqli_stmt_bind_param($stmt, "ss", $aUserName, $aUserName);

             // Execute the query
             mysqli_stmt_execute($stmt);
             $result = mysqli_stmt_get_result($stmt);

             // Check if the user is found in the database
             if (mysqli_num_rows($result) > 0) {
                 $row = mysqli_fetch_assoc($result);

                 // Verify the entered password against the hashed password in the database
                 $pwdCheck = password_verify( $aPassword, $row['pwd']);

                 // Check if the password is correct
                 if ($pwdCheck == false) {
                     // Redirect the user to the signup page with an error message
                    header("Location: Signup.php?error=wrongpassword");
                    exit();
                 } else {
                   // Start the session and set the user information
                   session_start();
                   $_SESSION['UserID'] = $row['UserID'];
                   $_SESSION['UserName'] = $row['UserName'];
                   // Redirect the user to the index page with a success message
                   header("Location:index.php?Login=Success");
                   exit();
                    
                 }
             } else {
                // Redirect the user to the signup page with an error message
                header("Location: Signup.php?error=nouserfound");
                exit();
             }
         } 
     }
} else {
     // Redirect the user to the signup page
     header("Location: Signup.php");
     exit();
}
