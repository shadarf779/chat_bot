<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  require 'dbh.inc.php';

  // Validate user input
  $aUserName = $_POST['aUserName'];
  $current_password = $_POST['current_password'];
  $new_password = $_POST['pwd'];
  $confirm_password = $_POST['Confirm'];

  // Check if the new password and confirm password match
  if ($new_password !== $confirm_password) {
    // Redirect the user to the change password page with an error message
    header("Location: change_password.php?error=passwordmismatch");
    exit();
  }

  // Get the user's current password from the database
  $sql = "SELECT * FROM usersignup WHERE UserName = ?";
  $stmt = mysqli_stmt_init($conn);

  // Check if the query preparation fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    // Redirect the user to the change password page with an error message
    header("Location: change_password.php?error=sqlerror");
    exit();
  } else {
    // Bind the parameters to the query
    mysqli_stmt_bind_param($stmt, "s", $aUserName);
    // Execute the query
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the user is found in the database
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      // Verify the entered current password against the hashed password in the database
      $pwdCheck = password_verify($current_password, $row['pwd']);

      // Check if the current password is correct
      if ($pwdCheck == false) {
        // Redirect the user to the change password page with an error message
        header("Location: change_password.php?error=wrongpassword");
        exit();
      } else {
        // Hash the new password
        $hashedPwd = password_hash($new_password, PASSWORD_DEFAULT);

        
        // Update the user's password in the database
        $sql = "UPDATE usersignup SET pwd = ? WHERE UserName = ?";
        $stmt = mysqli_stmt_init($conn);

        // Check if the query preparation fails
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // Redirect the user to the change password page with an error message
          header("Location: change_password.php?error=sqlerror");
          exit();
        } else {
          // Bind the parameters to the query
          mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $aUserName);
          // Execute the query
          $_SESSION['UserName'] = $row['UserName'];
          mysqli_stmt_execute($stmt);
          // Redirect the user to the index page with a success message
          header("Location: index.php?passwordChange=Success");
          exit();
          
        }
      }
    } else {
      // Redirect the user to the change password page with an error message
      header("Location: change_password.php?error=nouserfound");
      exit();
    }
  }
} else {
  // Redirect the user to the change password page
  header("Location: change_password.php");
  exit();
}
?>
