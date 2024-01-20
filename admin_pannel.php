
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
        h1{
            
        }
        </style>
</head>
<body>

        <div class="header">
    <h2>Welome To Admin Pannel of</h2>
        <h1> HANGMAN</h1>
        <form method="POST">
        <button type="Logout">Log Out</button>
    </form>
    </div>
    <?php
    if(isset($_POST['Logout']))
    {
        session_destory();
        header("location: admin_page.php";)
    }
    ?>
</body>
</html>