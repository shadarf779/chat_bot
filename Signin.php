
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
        background-image: #ddd;
    }
    .forms {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
            </style>

</head>
<body>
    
<section class="container forms">
            <div class="form login">               
<div class="form-content">
                    <header>Login</header>
                    
                    <form action="login.php" method="POST">
                            <!-- Get A User Name from user-->
                        <div class="field input-field">

                            <input type="text" name="aUserName" placeholder="User Name" class="input">
                        </div>
                            <!-- password -->
                            <div class="field input-field">
                              <input type="password" const password = generateStrongPassword(); id="pwd" name="pwd" placeholder="Create password" class="password" oninput="document.getElementById('pwd-text').value = this.value">
                            </div>
                            <div style="text-align: left;">
                              <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                        <!-- Forgot password-->
                        <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div>
                        
                            <!-- submit button-->
                            <div class="field button-field">
                            <button  type="Submit" name="Has-Logedin" >Login</button>
                        </div>
                 
                    </form>
                    <div class="field button-field">
            <button  style="background:orange" onclick="exit()">Back</button>
          </div>
                    <!-- Switch to sign up page-->
                    <div class="form-link">
                        <span>Don't have an account? <a href="signup.php" class="link signup-link">Signup</a></span>
                    </div>
                </div>


            </div>
</section>
<script>
  
    </script>
</body>
<script>
     function exit(){
        window.location.href = "index.php";
    }
    function myFunction() {
  var x = document.getElementById("pwd");
  var y = document.getElementById("pwd-text");
  if (x.type === "password") {
    x.type = "text";
    y.style.display = "block";
  } else {
    x.type = "password";
    y.style.display = "none";
  }
}
  </script>
</html>