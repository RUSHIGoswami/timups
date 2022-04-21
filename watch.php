<?php
session_start();
if ($_SESSION['logincheck'] != true) {
  header('Location: login.php');
}
if (isset($_GET['name'])) {
  include 'config/constants.php';
  $wname = $_GET['name'];
  $select = "SELECT * FROM `watches` WHERE `wname` = '$wname'";
  $result = mysqli_query($conn, $select);
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
  <link rel="shortcut icon" href="Assets/images/favicon.png" type="image/x-icon">

  <title>Timups | Single Watch</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="Assets/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="Assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="Assets/css/responsive.css" rel="stylesheet" />
  <style>

  </style>

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <?php include 'navbar.php'; ?>
    <!-- end header section -->
  </div>

  <!-- single watch section start -->
  <section class="shop_section layout_padding mx-5">
    <div class="box mx-5">
      <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
        <div class="row">
          <div class="col-6">
            <img src="Assets/images/<?php echo $rows['wimg']; ?>" style="margin-left:10em; width:240px; height:fit-content" alt="">
          </div>
          <div class="col-6">
            <h6><b><?php echo $rows['wname']; ?></b></h6>
            <h6><?php echo $rows['color']; ?></h6>
            <hr>
            <p>Brand:&nbsp; <?php echo $rows['brand']; ?></p>
            <p>Special Feature:&nbsp; <?php echo $rows['sfeature']; ?></p>
            <p>Operating system:&nbsp; <?php echo $rows['os']; ?></p>
            <p>Description:&nbsp; <?php echo $rows['descri']; ?></p>
            <hr>
            <h6><b>Price: <span style="color:red"><?php echo $rows['price']; ?></span></b></h6>
            <div class="btn-box mr-5">
              <a href="#" class="mx-3 mr-5">
                Buy COD
              </a>
              <a href="index.php" class="mx-3 mr-5">
                GO Back
              </a>
            </div>
          </div>
          <div class="new">
            <span>
              Featured
            </span>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <!-- single watch section end-->


  <!-- footer section -->
  <?php include 'footer.php'; ?>
  <!-- footer section -->

  <!-- jQery -->
  <script src="Assets/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="Assets/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="Assets/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>