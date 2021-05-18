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
                    <img src="assets/img/logo.jpg" class="fab" style="width: 50px; margin-right:20px;"></img>AlpetG Tech Blog</a>
            </div>
            <div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0">
                <span>Mir&euml;seerdh&euml;t!</span>
            </div>

        </div>
    </div>

    <nav class="navbar sticky-top navbar-expand-lg bg-light navbar-light">
        <div class="container-xxl">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Faqja Kryesore</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Kadegorit
                        </a>
                        <div class="dropdown-menu">
                            <?php get_kadegoirt_menu("post_categories") ?>
                        </div>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Rreth nesh</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Kontakti</a>
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