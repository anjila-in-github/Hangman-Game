<?php

include('connect.php');
session_start();

$errors = [];

if (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_SESSION['email'];
  
  if (strlen($password) < 6) {
          $errors[] = 'Password should be at least 6 characters long.';
  }
  else
  {
        if ($password==$confirm_password) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = '$password' WHERE email = '$email'"; 
                $result = mysqli_query($conn, $sql);
                if ($result) {
                        header('location: login.php');
                        exit();
        } else {
                $errors[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        } else {
                $errors[]=  "Password and Confirm Password do not match";
        }
  }
}
?> 

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel='stylesheet' href= 'https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap'>  
  <script src="https://kit.fontawesome.com/935834ea02.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/l.css">
</head>
<body>    
  <div class="content1">
    <h1>The</h1>
  </div>
        
  <div class="content2">
    <h1>Hangman</h1>
  </div>

  <img class="js-tilt" src="images/login.png" alt="">

  <div class="login-box">
    <h1>Reset Password</h1> 
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div style="color: red;">' . $error . '</div>';
            }
        }
        ?>


    <form class="" action="" method="post" autocomplete="off">
    <div class="input-group">
      <div class="user-box" >
        <input type="password" name="password" required="">      
        <label>
          <i class="fa-solid fa-lock"></i>new   Password
        </label>
      </div>
      
      <div class="user-box">
        <input type="password" name="confirm_password" required="">
        <label>
          <i class="fas fa-lock"></i> confirm Password               
        </label>                         
      </div>    
    </div>

    <div class="btn">   
        <button type="submit" name="submit">
          change password
        </button>       
    </div>
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
