<?php
require 'connect.php';
  if(isset($_POST["submit"]))
  {
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $cpwd=$_POST["cpwd"];
    $res=mysqli_query($conn,"SELECT * FROM login_data where username= '$username'");
    if(mysqli_num_rows($res)>0)
    {
      echo "<script> alert('Username has already been taken');</script>";
    }
    else{
      if($pwd == $cpwd){
        $query= "INSERT INTO login_data VALUES('$username','$pwd')";
        mysqli_query($conn,$query);
        echo "<script> alert('Registered Successfully');</script>";
      }
      else
      {
        echo "<script> alert('Password does not match');</script>";
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
  <link rel="stylesheet" href="css/register.css">
</head>
<body>    
  <div class="content1">
    <h1>The</h1>
  </div>
        
  <div class="content2">
    <h1>Hangman</h1>
  </div>

  <div class="login-box">
    <h1>Register</h1>
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
    <p>Already have an account?<a href="login.php"> Login now!</a></p> 
    </form>
  </div>
</body>
</html>