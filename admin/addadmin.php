<?php
session_start();
if ($_SESSION['loginCheck'] != true) {
    header('Location: adminlogin.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../config/constants.php';
    $username = $_POST["adminname"];
    $name = $_POST["name"];
    $password = $_POST["pass1"];
    $cpassword = $_POST["pass2"];

    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE `adminame` = '$username'");

    if ($password == $cpassword) {
        if (mysqli_num_rows($select) != 0) {
            echo "Username already exist";
        } else {
            $sql = "INSERT INTO `admin` (`adminame`, `name`, `password`) VALUES ('$username', '$name', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index.php");
            }
        }
    } else {
        echo "Passwords do not match";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Assets/css/login.css" />

    <title>Admin Login</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../Assets/images/favicon.png" alt="logo" width="59" height="50" style="margin-left: 36em" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="center">
        <h1>Add Admin</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="adminname" required />
                <span></span>
                <label>username</label>
            </div>
            <div class="txt_field">
                <input type="text" name="name" required />
                <span></span>
                <label>Admin name</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass1" required />
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass2" required />
                <span></span>
                <label>Confirm Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login" />
            <div class="signup_link"></div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>