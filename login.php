<?php
ob_start();
include "server.php";
include "database/config.php";

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header("Location:admin/admin_post.php");
}

?>

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

                        <h4 class="card-title">Panli i Adminit</h4>
                        <?php
                        if (!empty($msg)) {
                            echo  '<div class="alert alert-danger">
                                  <strong>' . $msg . '</strong>  
                                </div>';
                        }
                        ?>
                        <form method="POST" action="#">
                            <div class="form-group">
                                <label for="login_us">P&euml;rdoruesi</label>
                                <input id="login_us" type="text" class="form-control" placeholder="P&euml;rdoruesi" name="login_us" required="" autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani p&euml;rdoruesin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group">
                                <label for="login_pw">Fjal&euml;kalimi</label>
                                <input id="login_pw" type="password" placeholder="Fjal&euml;kalimi" class="form-control" name="login_pw" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani fjal&euml;kalimin');" oninput="this.setCustomValidity('');">
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