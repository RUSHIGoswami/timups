<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config/constants.php';
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["pass1"];
    $cpassword = $_POST["pass2"];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if ($password == $cpassword) {
        if (mysqli_num_rows($select) != 0) {
            $showErr = "Username Already Exists";
        } else {
            $sql = "INSERT INTO `users` (`username`, `fullname`, `email`, `password`) VALUES ('$username', '$fullname', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: login.php");
            }
        }
    } else {
        $showErr = "Passwords do not match";
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
    <title>Register</title>
</head>

<body>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="register.php" class="sign-in-form" method="post">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fa fa-user-plus"></i>
                        <input type="text" name="fullname" placeholder="Fullname" />
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="pass1" placeholder="Password" />
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="pass2" placeholder="Confirm Password" />
                    </div>
                    <input type="submit" class="btn" value="Register" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Already Have account ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <a href="login.php">
                        <button class="btn transparent" id="sign-up-btn">
                            Login
                        </button>
                    </a>

                </div>
                <img src="Assets/images/login/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="Assets/js/app.js"></script>
</body>

</html>