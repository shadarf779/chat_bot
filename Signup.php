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
    marquee{
        color: black;
    }
    .forms {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .marquee-wrapper {
    display: flex;
    justify-content: center;
  }
  </style>
  <title>Scrolling Text</title>
</head>

<body>
  <!-- Signup Form -->
  
  <section class="container forms">
    <div class="form signup">
      <div class="form-content">
        <header class="custom_color1 custom_size">Signup</header>
        <!-- fORM IS STARTING -->
        <form class="form-horizontal" action="SignUp.inc.php" method="POST">
          <!-- USER NAME -->
          <div class="field input-field">
            <input require type="text" class="form-control"  name="UserName" placeholder="User Name">
          </div>
          <!-- EMAIL -->
          <div class="field input-field">
            <input type="Email"class="form-control"   id="email" name="email" placeholder="Email" class="input">
          </div>
          <div class="field input-field">
            <input type="password" const password = generateStrongPassword(); id="pwd" name="pwd" placeholder="Create password" class="password" oninput="document.getElementById('pwd-text').value = this.value">
          </div>
          <div style="text-align: left;">
            <input type="checkbox" onclick="myFunction()">Show Password
          </div>
          
          
          <div class="field input-field">
            <input type="password" name="Confirm" placeholder="Confirm password" class="password">
          </div>
          <div class="field button-field">
            <button type="Submit" name="Has-Sumited">Signup</button>
          </div>
          <!-- FORM ENDED -->
          </form>
          <div class="field button-field">
            <button  style="background:orange" onclick="exit()">Back</button>
          </div>
        
          <div class="form-link">
            <span>Already have an account? <a href="Signin.php" class="link login-link">Login</a></span>
        </div>
        
      </div>
    </div>
  </section>
 
</body>
  <script>
    function generateStrongPassword(length = 8) {
  const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
  let password = '';
  while (password.length < length || !/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/[0-9]/.test(password) || !/[!@#$%^&*()_+]/.test(password)) {
    password = '';
    for (let i = 0; i < length; i++) {
      password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
  }
  return password;
}

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
