<?php
session_start();
// Check if the form has been submitted
if (isset($_POST['Has-Sumited'])) {
    
    // Require the database connection file
    require ('dbh.inc.php');

    // Get the form data
    $aUsername = $_POST['UserName'];
    $aEmail = $_POST['email'];
    $aPassword = $_POST['pwd'];
    $aConfirm = $_POST['Confirm'];
    $password = generateStrongPassword($aPassword);

    // Check if any of the fields are empty
    if (empty($aUsername) || empty($aEmail) || empty($aPassword) || empty($aConfirm)) {
        header("Location:signup.php?Signuperorr=emptyfield&UserName=".$aUsername."Email=".$aEmail);
        exit();
    } 
    // Check if the email or username is invalid
    else if (!filter_var($aEmail , FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA=Z0-9]*$/", $aUsername)) {
        header("Location:signup.php?Signuperorr=ivalidateemailandusername");
        exit();
    } 
    // Check if the email is invalid
    else if (!filter_var($aEmail , FILTER_VALIDATE_EMAIL)) {
        header("Location:signup.php?Signuperorr=ivalidateemail=".$aUsername);
        exit();
    } 
    // Check if the username is invalid
    else if (!preg_match("/^[a-zA=Z0-9]*$/", $aUsername)) {
        header("Location:signup.php?Signuperorr=ivalidUsername&email".$aEmail);
        exit();
    } 
    // Check if the password and confirmation don't match
    else if ($aPassword !== $aConfirm) {
        header("Location:signup.php?Signuperorr=passworderorr&email".$aEmail."USerName".$aUsername);
        exit();     
    } 
    // If all validation checks pass
    else {
        // Check if the username already exists in the database
        $sql = "SELECT UserName FROM usersignup WHERE UserName=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:signup.php?Signuperorr=sqlerorr");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "s", $aUsername);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            // If the username already exists
            if ($resultCheck > 0) {
                header("Location:signup.php?Signuperorr=usertakenemail=".$aEmail);
                exit(); 
            } 
            // If the username is available
            else
            {
                // Prepare an SQL statement for inserting a new user into the database
                $sql = "INSERT INTO usersignup (UserName, userEmail , pwd) VALUE (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
            
                // Check if the SQL statement has any error
                if (!mysqli_stmt_prepare($stmt,$sql))
                {
                    // If there is an error, redirect to the signup page with an error message
                    header("Location:signup.php?Signuperorr=sqlerorr");
                    exit(); 
                }  
                else
                {
                    // Hash the password before storing it in the database
                    $hashPwd = password_hash($aPassword, PASSWORD_DEFAULT);
                    
                    // Bind the parameters to the SQL statement
                    mysqli_stmt_bind_param($stmt , "sss" , $aUsername , $aEmail , $hashPwd);
                    
                    // Execute the SQL statement
                    mysqli_stmt_execute($stmt);
                    
                    // Store the result of the SQL statement
                    mysqli_stmt_store_result($stmt);   
                  
                    
                  // Retrieve the newly created user information
                  $sql = "SELECT * FROM usersignup WHERE userEmail=?";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: signup.php?Signuperorr=sqlerror");
                      exit();
                 } else {
                   mysqli_stmt_bind_param($stmt, "s", $aEmail);
                   mysqli_stmt_execute($stmt);
                   $result = mysqli_stmt_get_result($stmt);
                   $row = mysqli_fetch_assoc($result);

                      // Start the session and set the user information
                   session_start();
                      $_SESSION['UserID'] = $row['UserID'];
                      $_SESSION['UserName'] = $row['UserName'];
                      // Redirect the user to the index page with a success message
                      header("Location: index.php?Signup=Success");
                     exit();
      
                }  
            }
                    }
                }
    }
    // Close the statement and the connection to the database
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
    // If the request method is not POST, redirect to the signup page
    header("Location:signup.php");
    exit();
}

function generateStrongPassword($password) {
   
    while (strlen($password) < 8 || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        header("Location: signup.php?Signuperorr=NotStrongpassword");
        exit();
    }
    return $password;
  }
  



