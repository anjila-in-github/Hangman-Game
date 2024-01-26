<?php
@include 'connect.php';

$errors = [];

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    // Validate username
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }

    // Validate password length
    if (strlen($pwd) < 6) {
        $errors[] = 'Password should be at least 6 characters long.';
    }

    // Check if user already exists
    $select = "SELECT * FROM user  WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'User already exists!';
    }

    // Check if passwords match
    if ($pwd != $cpwd) {
        $errors[] = 'Passwords do not match!';
    }

    // Perform the database operation only if there are no errors
    if (empty($errors)) {
        // Insert user data into the database
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $insert = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashedPwd')";
        mysqli_query($conn, $insert);
        header('location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap'>
  <script src="https://kit.fontawesome.com/935834ea02.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/r.css">
</head>
<body>
      
  <div class="container" style="margin : auto ;padding: auto;">
    <div class="content1">
        <h1>The</h1>
    </div>
    
    <div class="content2">
        <h1>Hangman</h1>
    </div>
  </div>

  <!-- <img class="js-tilt" src="images/login.png" alt=""> -->

  <div class="login-box" style="margin-top:30px; padding:auto;">
    <h1>Register</h1>
    <?php
    if (!empty($errors)) {
      foreach ($errors as $error) {
        echo '<span class="error-msg" style = "color:red;">' . $error . '</span>';
      }
    }
    ?>

    <form class="" action="" method="post" autocomplete="off">

    <div class="input-group">
      <div class="user-box">
        <input type="text" name="username" required="">      
        <label>
          <i class="fa-solid fa-user"></i>  Username
        </label>
      </div>
    </div>

    <div class="input-group">
      <div class="user-box">
        <input type="email" name="email" required="">      
        <label>
        <i class="fa-solid fa-envelope"></i> Email
        </label>
      </div> 
    </div>
  
    <div class="input-group">     
      <div class="user-box">
        <input type="password" name="pwd" required="">
        <label>
          <i class="fas fa-lock"></i> Password                 
        </label>                         
      </div>
    <div>

    <div class="input-group"> 
      <div class="user-box">
        <input type="password" name="cpwd" required="">
        <label>
          <i class="fas fa-lock"></i> Confirm Password                 
        </label>                         
      </div>
    </div> 
           
      <script>
        var passwordInput = document.getElementById("pwd");
        var confirmPasswordInput = document.getElementById("cpwd");
        var delayTimer;

        passwordInput.addEventListener("input", function () {
            clearTimeout(delayTimer);
            delayTimer = setTimeout(validatePasswords, 500); // Adjust the delay if needed in milliseconds
        });

        confirmPasswordInput.addEventListener("input", function () {
            clearTimeout(delayTimer);
            delayTimer = setTimeout(validatePasswords, 500); // same as above comment
        });

        function validatePasswords() {
            var password = passwordInput.value;
            var confirmPassword = confirmPasswordInput.value;

            // Check if both passwords have equal or greater length
            if (confirmPassword.length >= password.length) {
                // Check if passwords match
                for (var i = 0; i < password.length; i++) {
                    if (password[i] !== confirmPassword[i]) {
                        // Passwords do not match
                        alert("Passwords do not match!");
                        // Redirect to the same page
                        window.location.href = window.location.href;
                        return;
                    }
                }
                // Passwords match
                console.log("Passwords match");
            }
        }
    </script> 

      <div class="btn">   
      <button type="submit" name="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Register Now
      </button>       
    </div>
    <p>Already have an account?<a href="login.php"> Login now!</a></p> 
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script type="text/javascript">
        $('.js-tilt').tilt({
            glare: true,
            maxGlare: .5,
            scale: 1.1
        })
    </script>
    
</body>
</html>
