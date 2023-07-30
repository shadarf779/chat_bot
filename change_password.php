
<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="Signupstyle.css"> 
   
  <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
            <style>
                body {
        background-image: url(campus.jpg);
    }
    .forms {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
            </style>

</head><body>
    <section class="container forms">
      <div class="form login">
        <div class="form-content">
          <header>Change Password</header>
          <form action="change_password.inc.php" method="POST">
            <!-- Get A User Name from user-->
            <div class="field input-field">
              <input type="text" name="aUserName" placeholder="Username" class="input">
            </div>
            <!-- current password -->
            <div class="field input-field">
              <input type="password" id="current-password" name="current_password" placeholder="Current password" class="password">
            </div>
            <div style="text-align: left;">
              <input type="checkbox" onclick="togglePasswordVisibility('current-password')">Show Password
            </div>
            <!-- new password -->
            <div class="field input-field">
              <input type="password" id="new-password" name="new_password" placeholder="New password" class="password">
            </div>
            <div style="text-align: left;">
              <input type="checkbox" onclick="togglePasswordVisibility('new-password')">Show Password
            </div>
            <!-- confirm password -->
            <div class="field input-field">
              <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm password" class="password">
            </div>
            <!-- submit button-->
            <div class="field button-field">
              <button type="submit" name="submit">Submit</button>
            </div>
          </form>
          <div class="field button-field">
            <button style="background:orange" onclick="goBack()">Back</button>
          </div>
          <!-- Switch to sign up page-->
          <div class="form-link">
            <span>Don't have an account? <a href="signup.php" class="link signup-link">Signup</a></span>
          </div>
        </div>
      </div>
    </section>

    <script>
      function togglePasswordVisibility(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      function goBack() {
        window.history.back();
      }
    </script>
  </body>
</html>