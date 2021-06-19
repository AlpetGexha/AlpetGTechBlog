<?php
ob_start();
$msg = "";
include "server.php";
include "database/config.php";

// if (!($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
//     header("Location:index.php");
// }

?>

<?php include "assets/php/head.php";
echo "<title> Regjistuhuni - AlpetGTech Blog</title></head>";
echo "<body>";
?>

<div class="Login-Page">
    <div class="container mt-5 h-100">

        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">

                        <h4 class="card-title">Regjistrimi</h4>
                        <?php
                        if (!empty($msg)) {
                            echo  '<div class="alert alert-danger">
                                  <strong>' . $msg . '</strong>  
                                </div>';
                        }
                        ?>
                        <form method="POST" action="#">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="reg_emri">Emri</label>
                                        <input id="reg_emri" type="text" class="form-control" placeholder="Name" name="reg_emri" value="" required autofocus="" oninvalid="this.setCustomValidity('Shkruani emrin');" oninput="this.setCustomValidity('');">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="row"></div>
                                        <label for="reg_mbiemri">Mbiemri</label>
                                        <input id="reg_mbiemri" type="text" class="form-control" placeholder="Surename" name="reg_mbiemri" value="" required autofocus="" oninvalid="this.setCustomValidity('Shkruani mbiemrin');" oninput="this.setCustomValidity('');">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reg_username">P&euml;rdoruesi</label>
                                <input id="reg_username" type="text" class="form-control" placeholder="Username" name="reg_username" value="" required autofocus="" oninvalid="this.setCustomValidity(' Shkruani p&euml;rdoruesin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group">
                                <label for="reg_email">Adresa Elektronike</label>
                                <input id="reg_email" type="email" class="form-control" placeholder="E-mail" name="reg_email" value="" required autofocus="" oninvalid="this.setCustomValidity('Shkruani adresen elektronike (e-mail)');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group">
                                <label for="reg_password">Fjal&euml;kalimi</label>
                                <input id="reg_password" type="password" placeholder="Password" class="form-control" name="reg_password" required data-eye oninvalid="this.setCustomValidity('Shkruani fjal&euml;kalimin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" name="register_submit" class="btn btn-primary btn-block">
                                    Regjistuhuni
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