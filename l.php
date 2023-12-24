<?php
@include 'connect.php';
session_start();
if(isset($_POST['submit'])){
   $username =$_POST['username'];
   $pwd = $_POST['pwd'];
   $select = " SELECT * FROM login_data WHERE username= '$username'";
   $result = mysqli_query($conn, $select);
   
   if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_array($result);
    if($pwd==$row['password']){
      if($row['role'] == 0){

        $_SESSION['admin_name'] = $row['username'];
        header('location:admin_page.php');
  
      }elseif($row['role'] == 1){
  
        $_SESSION['user_name'] = $row['username'];
        header('location:choose.php');  
     }   
    }
    else
    {
      $error[] = 'Wrong Password!';
    }
   }
   
   else{
      $error[] = 'User Not Registered!';
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
    <h1>Login</h1>

    <?php
    if(isset($error))
    {
      foreach($error as $error)
      {
        echo '<span id="error-msg" style="color:red;">'.$error.'</span>';
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
    </div>

    <div class="btn">   
        <button type="submit" name="submit" onclick="document.getElementById('audio').play()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Login Now
        </button>       
    </div>
    <p>Don't have an account? <a href="r.php"> Register now!</a></p> 

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
