<?php

$msg = "";
include "../server.php";
include "../database/config.php";
IamAdmin();
?>



<?php get_Aheader("Kategory Admin"); ?>


<div id="layoutSidenav_content">

    <style>
        /************* Login *************/
        .Login-Page {
            background-color: #f7f9fb;
            font-size: 14px;
        }

        .Login-Page .card-wrapper {
            width: 760px;
        }

        .Login-Page .card {
            border-color: transparent;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
        }


        .Login-Page .card .fat {
            padding: 10px;
        }

        .Login-Page .card .card-title {
            margin-bottom: 30px;
        }

        .Login-Page .form-control {
            border-width: 2.3px;
        }

        .Login-Page .form-group label {
            width: 100%;
        }

        .Login-Page .btn .btn-block {
            padding: 12px 10px;
        }
    </style>

    <div class="Login-Page">
        <div class="container-fluid mt-5 h-100">
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
</div>

</body>

</html>