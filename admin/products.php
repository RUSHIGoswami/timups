<?php
session_start();
if ($_SESSION['loginCheck'] != true) {
    header('Location: adminlogin.php');
}
include '../config/constants.php';
$select = "SELECT * FROM `watches`";
$result = mysqli_query($conn, $select);
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

    <style>
        table {
            table-layout: fixed;
            width: 100%;
            border: 1px solid black;
        }

        th,
        td {
            text-align: center;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            width: 1fr;
        }
    </style>

</head>

<body class="sub_page">

    <?php include 'adminnav.php'; ?>
    <section class="shop_section layout_padding mx-5">
        <div class="box mx-5">
            <table>
                <tr>
                    <th>Watch Name</th>
                    <th>Watch image</th>
                    <th>Brand Name</th>
                    <th>OS</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Units</th>
                    <th colspan="2">Operations</th>
                </tr>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $rows['wname']; ?></td>
                        <td><img src="../Assets/watches/<?php echo $rows['wimg']; ?>" style="max-width: 100%; max-height: 50%" alt=""></td>
                        <td><?php echo $rows['brand']; ?></td>
                        <td><?php echo $rows['os']; ?></td>
                        <td><?php echo $rows['color']; ?></td>
                        <td><?php echo $rows['price']; ?></td>
                        <td><?php echo $rows['units']; ?></td>
                        <td><a href="editprdt.php?name=<?php echo $rows['wname']; ?>">Edit</a></td>
                        <td><a href="deleteprdt.php?name=<?php echo $rows['wname']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
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