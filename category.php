<?php
    @include 'connect.php';
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location:l.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap'>
    <script src="https://kit.fontawesome.com/935834ea02.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/category.css">
</head>
<body>    
    <div class="container">
        <h1 class="heading"><i class="fa-solid fa-gamepad fa-1x"></i> Select Category</h1>
        <a href="html/exit.html">
            <div class="end">
                <button>
                    End Game
                </button>
            </div>
        </a>

        <p>Don't know how to play? <a href="html/tutorial.html"> Click Here</a></p> 
        
        <div class="box-container">
            <div class="box">
                <img src="images/22.jpg" alt="">
                <a href="html/occupations.html" class="btn">
                    <i class="fa fa-play"></i>
                    Occupations
                </a>
            </div>

            <div class="box">
                <img src="images/33.jpg" alt="">
                <a href="html/animals.html" class="btn">
                    <i class="fa fa-play"></i>
                    Animals
                </a>
            </div>

            <div class="box">
                <img src="images/44.jpg" alt="">
                <a href="html/clothes.html" class="btn">
                    <i class="fa fa-play"></i>
                    Clothes
                </a>
            </div>

            <div class="box">
                <img src="images/55.jpg" alt="">
                <a href="html/transp.html" class="btn">
                    <i class="fa fa-play"></i>
                    Transportations
                </a>
            </div>

            <div class="box">
                <img src="images/66.jpg" alt="">
                <a href="html/vege.html" class="btn">
                    <i class="fa fa-play"></i>
                    Vegetables
                </a>
            </div>

            <div class="box">
                <img src="images/mix.jpg" alt="">
                <a href="html/mix.html" class="btn">
                    <i class="fa fa-play"></i>
                    Mixed Category
                </a>
            </div>

            <div class="box">
                <img src="images/88.jpg" alt="">
                <a href="html/sports.html" class="btn">
                    <i class="fa fa-play"></i>
                    Sports
                </a>
            </div>

            <div class="box">
                <img src="images/99.jpg" alt="">
                <a href="html/birds.html" class="btn">
                    <i class="fa fa-play"></i>
                    Birds
                </a>
            </div>


            <div class="box">
                <img src="images/1111.jpg" alt="">
                <a href="html/fruits.html" class="btn">
                    <i class="fa fa-play"></i>
                    Fruits
                </a>
            </div>

            <div class="box">
                <img src="images/1212.jpg" alt="">
                <a href="html/musical.html" class="btn">
                    <i class="fa fa-play"></i>
                    Musical Instruments
                </a>
            </div>
        </div>
    </div>
   
    <script>
        const button = document.querySelector("#button");
        const icon = document.querySelector("#button > i");
        const audio = document.querySelector("audio");

        button.addEventListener("click", () => {
            if (audio.paused) {
                audio.volume = 0.2;
                audio.play();
                icon.classList.remove('fa-volume-up');
                icon.classList.add('fa-volume-mute');

            } else {
                audio.pause();
                icon.classList.remove('fa-volume-mute');
                icon.classList.add('fa-volume-up');
            }
            button.classList.add("fade");
        });

    </script>
</body>
</html>