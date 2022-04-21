<?php
session_start();
if ($_SESSION['logincheck'] != true) {
  header('Location: login.php');
}
include 'config/constants.php';
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
  <link rel="shortcut icon" href="Assets/images/favicon.png" type="image/x-icon">

  <title>Timups | Watches</title>


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

</head>

<body class="sub_page">

  <div class="hero_area">

    <!-- header section strats -->
    <?php include 'navbar.php'; ?>
    <!-- end header section -->
  </div>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Watches
        </h2>
      </div>
      <div class="row">
        <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
          <div class="col-md-6 ">
            <div class="box">
              <a href="watch.php?name=<?php echo $rows['wname']; ?>">
                <div class="img-box">
                  <img src="Assets/images/<?php echo $rows['wimg']; ?>" alt="">
                </div>
                <div class="detail-box">
                  <h6>
                    <?php echo $rows['wname']; ?>
                  </h6>
                  <h6>
                    Price:
                    <span>
                      &#8377; <?php echo $rows['price']; ?>
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    Featured
                  </span>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="btn-box">
        <a href="index.php">
          Go Back
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->

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