<?php
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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn, md5(rand()));
    $choice = $_POST['choice'];


    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert'>{$email}-this email already exists!</div>";
    } else {

        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (name, email, password, code ,choice) VALUES ('{$name}','{$email}','{$password}', '{$code}' ,'{$choice}')";
            $result = mysqli_query($conn, $sql);
            $sql1 = "INSERT INTO jobs (email) VALUES ('{$email}')";
            $result1 = mysqli_query($conn, $sql1);
            $sql2 = "INSERT INTO emp (name,email,choice) VALUES ('{$name}','{$email}','{$choice}')";
            $result2 = mysqli_query($conn, $sql2);


            if ($result) {
                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = '';                     //SMTP username
                    $mail->Password   = '';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('', 'Jobportal');
                    $mail->addAddress($email);


                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'no-reply';
                    $mail->Body    = 'JobPortal connecting emplyoyees and employers.
                    Donot share the verification link with any one.
                    Here is the verification link <b><a href="http://localhost/mini project1/?verification=' . $code . '">http://localhost/mini project1/?verification=' . $code . '</a></b>';


                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert-suc'>we've send a verification link on your email address.</div>";
            } else {
                $msg = "<div class='alert'>something wrong </div>";
            }
        } else {
            $msg = "<div class='alert'>password and confirm password do not match !</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobportal</title>
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <style>
        .alert {
            background: crimson;
            margin-top: 5px;
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
            font-weight: 500;
            border-radius: 2px;

        }
    </style>
    <div class="wrapper">




        <!-- reg -->
        <div class="form-box register">
            <h2>Register</h2>
            <?php echo $msg; ?>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                    <input type="text" name="name" required placeholder=" " value="<?php if (isset($_POST['submit'])) {
                                                                                        echo $name;
                                                                                    } ?>">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"> <ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required placeholder=" " value="<?php if (isset($_POST['submit'])) {
                                                                                            echo $email;
                                                                                        } ?>">
                    <label>Email</label>
                </div>


                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required placeholder=" ">
                    <label>Password</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="confirm-password" required placeholder=" ">
                    <label>Confirm password</label>
                </div>
                <div class="label1"><label for="">Register as</label></div>
                <div class="custom-select">
                    <!-- <label><input type="checkbox">Employee</label>
                    <label><input type="checkbox">Employer</label> -->


                    <select name="choice" class="select-selected">

                        <div class="opton1">
                            <option value="0">Employee</option>
                        </div>
                        < <div>
                            <option value="1">Employer</option>
                </div>

                </select>
        </div>

        <button name="submit" type="submit" class="btn"> Register</button>
        <div class="login-register">
            <p>Already have an account?<a href="index.php" class="login-link">Login</a></p>
        </div>

        </form>

    </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">

    </script>
    <script src="login1.js"></script>
</body>

</html>