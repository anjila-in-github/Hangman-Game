
<?php
include 'connect.php';
session_start();
$errors = [];
// Check if OTP form is submitted
if (isset($_POST['submit'])) {


    if ($_SESSION['otp']==$_POST['otp']) {
        $email = $_SESSION['email']; 
        $_SESSION['email'] = $email;
        header('Location: change_password.php');
        exit();
    } else {
        // OTP is incorrect, display error message
        $errors[]= "Invalid OTP. please check your email for the OTP or click on resend OTP to get a new OTP.";
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
      <div class="user-box">
        <input type="text"  name="otp" required="true">
        <label>
          <i class="fas fa-lock"></i> enter OTP             
        </label>                         
      </div>    
    </div>

    <div class="btn">   
        <button type="submit" name="submit">
          confirm 
        </button>       
</div>
        <p>Resend Otp<a href="send_reset_password.php"> Click Here!</a></p>
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

