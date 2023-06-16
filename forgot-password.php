<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='{$code}' WHERE email='{$email}'");

        if ($query) {
            echo "<div style='display: none;'>";
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '//';                    //SMTP username
                $mail->Password   = '//';                                  //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('//', 'Jobportal');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'no reply';
                $mail->Body    = 'Here is the verification link for new password<b><a href="http://localhost/mini project1/change-password.php?reset=' . $code . '">http://localhost/login/change-password.php?reset=' . $code . '</a></b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";
            $msg = "<div class='alert-suc'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert'>$email - This email address do not found.</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot-Password</title>
    <link rel="stylesheet" href="forgot-password.css">
</head>

<body>
    <style>
        .alert {
            background: crimson;

            margin-bottom: 25px;
            padding: 2px;
            text-align: center;
            color: white;
            font-weight: 400;
            border-radius: 2px;

        }

        .alert-suc {
            background: white;

            margin-bottom: 25px;
            padding: 2px;
            text-align: center;
            color: crimson;
            font-weight: 400;
            border-radius: 2px;

        }
    </style>
    <div class="container">
        <div class="h1">Forgot Password</div>
        <?php echo $msg; ?>
        <form action="" method="post">
            <div class="input-box">
                <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                <input type="email" class="email" name="email" required placeholder=" ">
                <label>Email</label>
                <div class="btn"> <button name="submit" type="submit" class="btn"> Send Reset Link</button></div>

        </form>
        <div class="login-register">
            <p>Back to login<a href="index.php" class="login-link">Login</a></p>
        </div>
</body>

</html>