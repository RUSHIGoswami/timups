<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.php">
        <span>
          Timups
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="watches.php"> Watches </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php"> About </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
        <?php if ($_SESSION['logincheck'] == true) { ?>
          <div class="user_option-box">
            Welcome, <?php echo $_SESSION['name']; ?>
            <a href="logout.php">
              logout
            </a>
          </div><?php } ?>
      </div>
    </nav>
  </div>
</header>