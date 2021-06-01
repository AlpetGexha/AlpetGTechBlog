<?php include "server.php"; ?>
<?php include "assets/php/head.php";
echo "<title> Login - AlpetGTech Blog</title></head>";
echo "<body>";
?>
<div class="Login-Page">
    <div class="container mt-5 h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <?php
                        if (!empty($msg)) {
                            echo '<p>' . $msg . '</p>';
                        }
                        ?>
                        <h4 class="card-title">Panli i Adminit</h4>
                        <form method="POST" action="#">
                            <div class="form-group">
                                <label for="login_username">P&euml;rdoruesi</label>
                                <input id="login_username" type="text" class="form-control" placeholder="P&euml;rdoruesi" name="username" value="" required="" autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani p&euml;rdoruesin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group">
                                <label for="password">Fjal&euml;kalimi</label>
                                <input id="password" type="password" placeholder="Fjal&euml;kalimi" class="form-control" name="password" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani fjal&euml;kalimin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" name="login_submit" class="btn btn-primary btn-block">
                                    Kyquni
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>