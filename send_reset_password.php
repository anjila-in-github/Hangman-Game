
<?php
@include 'connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Path to PHPMailer autoload file

session_start();
function generateOTP() {
    return sprintf("%06d", mt_rand(1, 999999));
}

function sendEmail($to, $subject, $message) {

        //install compser and then install phpmailer
        //composer require phpmailer/phpmailer
        $mail = new PHPMailer();
        try {
            //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'rocktrilochan2@gmail.com'; // SMTP username
        $mail->Password = 'ifxm mqte cfac svuf'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect throw new Exception("Error Processing Request", 1);

        $mail->addAddress($to); // Add a recipient

        //Content 
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        
}

$errors = [];

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $checkEmail = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userEmail = $row['email'];

        // Generate and store OTP in the database
        $otp = generateOTP();
        $hashedOTP = password_hash($otp, PASSWORD_DEFAULT);

        $updateOTPQuery = "UPDATE user SET reset_token_hash = '$hashedOTP' WHERE email = '$userEmail'";
        mysqli_query($conn, $updateOTPQuery);

        // Send OTP to user's email
        $subject = "Password Reset OTP";
        $message = "For Hang Man Your OTP for password reset is: $otp";
        sendEmail($userEmail, $subject, $message);

        // Redirect to the page where the user can verify the OTP
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $userEmail;
        header('location: verify_otp.php');
        exit();
    } else {
        $errors[] = 'User with this email does not exist!';
    }
}
?>

<!DOCTYPE html>


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
    <h1>Forgot Password</h1> 
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
        <input type="email"  name="email" required="">
        <label>
          <i class="fas fa-user"></i> enter user Email
        </label>                         
      </div>    
    </div>

    <div class="btn">   
        <button type="submit" name="submit">
          confirm 
        </button>       
    </div>
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

