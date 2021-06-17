<body>
    <!-- ------------ Boostrap JS ------------------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- ------------ Ajax------------------ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ------------ jQuery------------------ -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 logo text-left">
                <a style="color:#01cd74;" class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.jpg" class="fab" style="width: 50px; margin-right:20px;" loading="lazy"></img>AlpetG Tech Blog</a>
            </div>
            <div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0">
                <span>Mir&euml;seerdh&euml;t!</span>
                <?php
                if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] != '0') {
                    require "database/config.php";
                    $sql = "SELECT * from users";
                    $result = mysqli_query($db, $sql);
                    $row = $result->fetch_assoc();
                    echo "<b>" . $row['username'] . "</b>";
                    echo '
                    <a class="far" href="admin/admin_user.php">Admin Control Panel</a>
                ';
                }
                ?>
            </div>

        </div>
    </div>

    <nav class="navbar sticky-top navbar-expand-md bg-light navbar-light main-navbar">
        <div class="container-xxl">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                <!-- <img src="assets/img/logo.jpg" alt=""> -->
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Faqja Kryesore</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Kategorit
                        </a>
                        <div class="dropdown-menu">
                            <?php get_kadegoirt_menu("post_categories") ?>
                        </div>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Rreth nesh</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="kontakti.php">Kontakti</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <form method="GET" action="search.php" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="K&euml;rkoni" name="search_post" required="" oninvalid="this.setCustomValidity('Shruani p&euml;r t&euml; k&euml;rkuar');" oninput="this.setCustomValidity('');">
                        <button class=" btn btn-outline-success" type="submit" name="submit">K&euml;rko</button>
                    </form>
                </ul>
            </div>
    </nav>