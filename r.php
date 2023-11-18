<?php
@include 'connect.php';
if(isset($_POST['submit'])){

   $username =$_POST['username'];
   $pwd = $_POST['pwd'];
   $cpwd =$_POST['cpwd'];
   $user_type = $_POST['user_type'];
   $select = " SELECT * FROM login_data WHERE username= '$username'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exist!';
   }
   else{
      if($pwd != $cpwd){
         $error[] = 'Password does not match!';
      }
      else{
         $insert = "INSERT INTO login_data(username, pwd, user_type) VALUES('$username','$pwd','$user_type')";
         mysqli_query($conn, $insert);
         $error[]='Registered Successfully';
      }
   }
};
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel='stylesheet' href= 'https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap'>  
  <script src="https://kit.fontawesome.com/935834ea02.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/r.css">
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
    <h1>Register</h1>

    <?php
    if(isset($error))
    {
      foreach($error as $error)
      {
        echo '<span class="error-msg">'.$error.'</span>';
      };
    };
    ?>

    <form class="" action="" method="post" autocomplete="off">
    <div class="input-group">
      <div class="user-box" >
        <input type="text" name="username" required="">      
        <label>
          <i class="fa-solid fa-user"></i>  Username
        </label>
      </div>
      
      <div class="user-box">
        <input type="password" name="pwd" required="">
        <label>
          <i class="fas fa-lock"></i> Password                 
        </label>                         
      </div>
        
      <div class="user-box">
        <input type="password" name="cpwd" required="">
        <label>
          <i class="fas fa-lock"></i> Confirm Password                 
        </label>                         
      </div>
      
      <div class="user-box">
        <select name="user_type">
          <option value="User">User</option>
          <option value="Admin">Admin</option>
        </select>
    </div>

    <div class="btn">   
      <button type="submit" name="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Register Now
      </button>       
    </div>
    <p>Already have an account?<a href="l.php"> Login now!</a></p> 
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