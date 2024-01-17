<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewpoint" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheeet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzrlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap'>
        <script src="https://kit.fontawesome.com/935834ea02.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/choose.css">
    </head>
    <body>
        <section>
            <header>
                <h2>CHOOSE YOUR LEVEL <i class="fa-regular fa-face-smile-wink"></i> </h2>
            </header>
            <div class="imgs">               
                <div>
                    <a href="html/ec.html">
                        <img src="images/e.png" >
                    </a>
                    <a href="html/medc.html">
                        <img src="images/me.png" >
                    </a>
                    <a href="html/difc.html">
                        <img src="images/d.png" >
                    </a>
                    <a href="html/mix.html">
                        <img src="images/m.png" >
                    </a>
                </div>
                <div>
                    <a href="html/ec.html">
                        <img src="images/e.png" >
                    </a>
                    <a href="html/medc.html">
                        <img src="images/me.png" >
                    </a>
                    <a href="html/difc.html">
                        <img src="images/d.png" >
                    </a>
                    <a href="html/mix.html">
                        <img src="images/m.png" >
                    </a>
                </div>              
            </div>
            
            <ul class="navigation">
                <li class ="home"><a href="#"><i class="fa-solid fa-house"></i></a></li>
            </ul>
          
        </section>
  
    </body>    
</html>

