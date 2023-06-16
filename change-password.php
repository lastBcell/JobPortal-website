<?php


$msg = "";

include 'config.php';

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: index.php");
                }
            } else {
                $msg = "<div class='alert'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert'>Reset Link do not match.</div>";
    }
} else {
    header("Location: forgot-password.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change-password</title>
    <link rel="stylesheet" href="forgot-password.css">
</head>

<body>
<style>
        .alert{
            background: crimson;
            
            margin-bottom:25px;
            padding:2px ;
            text-align:center;
            color: white;
            font-weight:400;
            border-radius:2px;
    
        }
        .alert-suc{
            background: white;
            
            margin-bottom:25px;
            padding:2px ;
            text-align:center;
            color: crimson;
            font-weight:400;
            border-radius:2px;
    
        }
    </style>
    <div class="container">
        <div class="h1">Change Password</div>
        <?php echo $msg; ?>
        <form action="" method="post">
            <div class="input-box">
                <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                <input type="password" class="password" name="password" required placeholder=" ">
                <label>New password</label>
                <div class="input-box">
                <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                <input type="password" class="confirm-password" name="confirm-password" required placeholder=" ">
                <label>confirm new password</label>
                <div class="btn"> <button name="submit" type="submit" class="btn"> Change Password</button></div>

        </form>
        <div class="login-register">
                    <p>Back to login<a href="index.php" class="login-link">Login</a></p>
    </div>
</body>

</html>