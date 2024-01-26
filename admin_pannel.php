
<?php
    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header("location: admin_page.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_pannel</title>
    <style>
        body{
            margin:0px;
        }
    div.header{
        font-family:Poppins;
        display:flex;
        justify-content: space-between;
        align-items:center;
        padding:0px 60px;
        background-color:#204969;
    }
            div.header button{
                background-color:#f0f0f0;
                font-size:16px;
                font-weight:550;
                padding:8px 12px;
                border:2px solid black;
                border-radius: 5px;
            }
        
        </style>
</head>
<body>

        <div class="header">
    <h2>Welome To Admin Pannel of</h2>
        <h1> HANGMAN</h1>
        <form method="POST">
        <button name="Logout">Log Out</button>
    </form>
    </div>
    <?php
    if(isset($_POST['Logout']))
    {
        session_destroy();
        header("location: admin_page.php");
    }
    ?>
</body>
</html>