<?php
require 'connect.php';
  if(isset($_POST["submit"]))
  {
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $res=mysqli_query($conn,"SELECT * FROM login_data where username= '$username'");
    $row=mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res)>0)
    {
      if($pwd==$row['pwd'])
      {
        $_SESSION["login"]=true;
        $_SESSION["id"]=$row["id"];
        header("Location:start.html");
      }
      else
      {
        echo
        "<script> alert('Wrong Password');</script>";
      }
    }
    else{     
        echo 
        "<script> alert('User Not Registered');</script>";
      
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
  <link rel="stylesheet" href="css/reg&log.css">
</head>
<body>    
  <div class="content1">
    <h1>The</h1>
  </div>
        
  <div class="content2">
    <h1>Hangman</h1>
  </div>

  <div class="login-box">
    <h1>Sign up</h1>
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
       
      <p>Forgot Password <a href="#">Click Here!</a></p>
    </div>

    <div class="btn">  
    <button> 
    <a href="register.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
            Sign Up
    </a>
    </button>

    <div class="space"></div>

    <button type="submit" name="submit">        
        <span></span>
        <span></span>
        <span></span>
        <span></span> 
            Sign In
    </button>            
    </div>
      
    </form>
  </div>
</body>
</html>