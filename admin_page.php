<?php
   
   require("connect.php");
   
if(isset($_POST['Signin']))
{
   $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
   $result=mysqli_query($conn,$query);
if(mysqli_num_rows($result) == 1)
{
   session_start();
   $_SESSION['AdminLoginId'] = $_POST['AdminName'];
   header("location: admin_pannel.php");
}
else{
   echo"<script>alert('Incorrect Password');</script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin page</title>
   <link rel="stylesheet" href='https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap'>
   <link rel='stylesheet' href= 'https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap'>  
  <script src="https://kit.fontawesome.com/935834ea02.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   <div class="login-form">
      
   <h2>ADMIN LOGIN PANEL</h2>
   <form method="POST" >
      
      <div class="input-field">
         <i class="fas fa-user"></i>
         <input type="text" placeholder="Admin Name" name="AdminName">
</div>

<div class="input-field">
   <i class="fas fa-lock"></i>
   <input type="password" placeholder="Password" name="AdminPassword">
</div>

<button type="submit" name="Signin">Sign In </button>

<div class="extra">
   <a href="#">Forgot Password??</a>
</div>
</form>
</div>
</body>
</html>