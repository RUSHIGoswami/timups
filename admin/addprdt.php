<?php
session_start();
if ($_SESSION['loginCheck'] != true) {
    header('Location: adminlogin.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config/constants.php';
    $wname = $_POST['wname'];
    $brand = $_POST['brand'];
    $os = $_POST['os'];
    $color = $_POST['color'];
    $sfeature = $_POST['sfeature'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $units = $_POST['units'];
    $descri = $_POST['descri'];

    $insert_sql = "INSERT INTO `watches` (`wname`, `brand`, `os`, `color`, `sfeature`, `wimg`, `price`, `units`, `descri`) VALUES ('$wname','$brand','$os','$color','$sfeature', '$image','$price', '$units', '$descri')";
    $result = mysqli_query($conn, $insert_sql);
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
                                Add Smart Watches
                            </h2>
                        </div>
                        <form action="addprdt.php" method="post">
                            <div>
                                <input type="text" placeholder="Watch Name" name="wname" required />
                            </div>
                            <div>
                                <input type="text" placeholder="Watch Brand" name="brand" required />
                            </div>
                            <div>
                                <input type="text" placeholder="Operating System" name="os" required />
                            </div>
                            <div>
                                <input type="text" placeholder="Color" name="color" required />
                            </div>
                            <div>
                                <input type="text" placeholder="Special Feature" name="sfeature" required />
                            </div>
                            <div>
                                <input name="image" placeholder="Watch Image" type="file" id="formFile" multiple onchange="preview()" required />
                            </div>
                            <div>
                                <input type="number" min placeholder="Price" name="price" min="1500" value="1500" step="any" required />
                            </div>
                            <div>
                                <input type="number" placeholder="Units" name="units" min="5" value="5" step="any" required />
                            </div>
                            <div>
                                <textarea type="text" class="message-box" rows="3" cols="66" placeholder="Description" name="descri" required style="resize: none;"></textarea>
                            </div>
                            <div class="d-flex ">
                                <input type="submit" name="submit" value="Add" style="background: #f0d43a">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img id="frame" src="" class="img-fluid" width="400px" height="auto" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQery -->
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0])
        }

        function clearImage() {
            document.getElementById('formFile').value = null
            frame.src = ''
        }
    </script>
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