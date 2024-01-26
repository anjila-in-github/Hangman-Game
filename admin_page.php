<?php
   @include 'connect.php';
   session_start();
   if(!isset($_SESSION['admin_name'])){
      header('location:login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin page</title>
   <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap'>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   
<div class="container">
   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="l.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
