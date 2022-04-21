<?php
session_start();
if ($_SESSION['loginCheck'] != true) {
    header('Location: adminlogin.php');
}
include '../config/constants.php';
if (isset($_GET['name'])) {
    $wname = $_GET['name'];
    $select = "SELECT * FROM `watches` WHERE `wname` = '$wname'";
    $result = mysqli_query($conn, $select);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config/constants.php';
    $wname = $_POST['wname'];
    $brand = $_POST['brand'];
    $os = $_POST['os'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $units = $_POST['units'];

    $update_sql =
        "UPDATE `watches` SET `brand`='$brand', `os`='$os', `color`= '$color', `price`='$price', `units`='$units' WHERE `wname`='$wname'";
    $result = mysqli_query($conn, $update_sql);
    if ($result) {
        header("Location: products.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="../Assets/images/favicon.png" type="image/x-icon">

    <title>Timups | Admin</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.css" />
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="../Assets/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../Assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../Assets/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">

    <?php include 'adminnav.php'; ?>
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Update Smart Watch
                            </h2>
                        </div>
                        <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                            <form action="addprdt.php" method="post">
                                <div>
                                    <input type="text" placeholder="Watch Name" name="wname" value="<?php echo $rows['wname']; ?>" required />
                                </div>
                                <div>
                                    <input type="text" placeholder="Watch Brand" name="brand" value="<?php echo $rows['brand']; ?>" required />
                                </div>
                                <div>
                                    <input type="text" placeholder="Operating System" name="os" value="<?php echo $rows['os']; ?>" required />
                                </div>
                                <div>
                                    <input type="text" placeholder="Color" name="color" value="<?php echo $rows['color']; ?>" required />
                                </div>
                                <div>
                                    <input type="number" min placeholder="Price" name="price" min="1500" value="<?php echo $rows['price']; ?>" step="any" required />
                                </div>
                                <div>
                                    <input type="number" placeholder="Units" name="units" min="5" value="<?php echo $rows['units']; ?>" step="any" required />
                                </div>
                                <div class="d-flex ">
                                    <input type="submit" name="submit" value="Add" style="background: #f0d43a">
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>

    <!-- jQery -->
    <script src="../Assets/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="../Assets/js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script src="../Assets/js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>