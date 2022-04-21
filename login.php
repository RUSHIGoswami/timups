<?php

$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config/constants.php';
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $sql = "SELECT * FROM `users` WHERE  `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        session_start();
        $login = true;
        $_SESSION['name'] = $username;
        $_SESSION['logincheck'] = $login;
        header("Location: index.php");
    } else {
        $showErr = "Invalid Creds";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- for title img -->
    <link rel="shortcut icon" type="image/icon" href="Assets/images/favicon.jpg" />
    <link rel="stylesheet" href="Assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/css/userlogin.css" />
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" class="sign-in-form" method="post">
                    <h2 class="title">Login</h2>
                    <?php
                    if (isset($showErr)) {
                        echo '<h3 style="color:red">Invalid Credentials</h3>';
                        echo '<h3 style="color:red">New Here? Click to register button</h3>';
                    }
                    ?>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="pass" placeholder="Password" required />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <a class="register" href="register.php">
                        <button class="btn transparent" id="sign-up-btn">
                            Register
                        </button>
                    </a>

                </div>
                <img src="Assets/images/login/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <!-- <script src="assets/js/app.js"></script> -->
</body>

</html>