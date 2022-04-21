<header class="header_section">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <span>
                Timups, Admin <?php if (isset($_COOKIE['admin'])) {
                                    echo "" . $_COOKIE['admin'];
                                } ?>
            </span>
        </a>
    </div>
</header>