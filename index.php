<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

include 'config.php';
$msg = "";

if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");

        if ($query) {
            $msg = "<div class='alert-suc'>Account verification has been successfully completed.</div>";
        }
    } else {
        header("Location:index.php");
    }
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (empty($row['code'])) {
            $_SESSION['SESSION_EMAIL'] = $email;
            header("Location: welcome.php");
        } else {
            $msg = "<div class='alert'>First verify your account and try again.</div>";
        }
    } else {
        $msg = "<div class='alert'>Email or password do not match.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <style>
        .alert {
            background: crimson;
            margin-top: 10px;
            padding: 5px;
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
    <div class="wrapper">


        <div class="form-box login">
            <h2>Login</h2>
            <?php echo $msg; ?>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"> <ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" class="email" name="email" required placeholder=" ">
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" class="password" name="password" required placeholder=" ">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <!-- <label><input type="checkbox"> remember me</label> -->
                    <a href="forgot-password.php">Forgot password ?</a>
                </div>
                <button name="submit" type="submit" class="btn"> Login </button>
                <div class="login-register">
                    <p>don't have an account?<a href="register.php" class="register-link">Register</a></p>
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