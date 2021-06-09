<?php

$msg = "";
include "../server.php";
include "../database/config.php";


$sql = "SELECT u.id, u.emri, u.mbiemri, u.username,u.email,u.j_data, r.role, p.userid FROM users u, post p, roles r WHERE u.role = r.id ";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
ob_start();
?>

<?php get_Aheader("Post Admin"); ?>

<div id="layoutSidenav_content">

    <div class="container mt-5">

        <div class="row flex-lg-nowrap mt-3">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">


                                <?php
                                if (!empty($msg)) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?php echo $msg; ?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>


                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">

                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded">
                                                    <img class="rounded-circle" src="../assets/img/logo.jpg" alt="" width="140px" height="140px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row['emri'] . " " . $row['mbiemri'] ?></h4>
                                                <p class="mb-0"><?php echo "@" . strtolower($row['username']) ?></p><br>
                                                <div class="mt-2">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Ndryho Foton</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <?php
                                                if (isset($_SESSION['ROLE']) &&  $_SESSION['ROLE'] != '0') {
                                                    echo  ' <span class="badge badge-danger">' . $row['role'] . '</span> ';
                                                }
                                                ?>
                                                <div class="text-muted"><small>Antar q&euml; nga: <i><?php echo date('j F, Y', strtotime($row['j_data']));  ?></i></small></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" method="POST" action="#">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Emri:</label>
                                                                    <input class="form-control" type="text" name="profile_name" require="" placeholder="Emri" value="<?php echo $row['emri']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Mbiemri:</label>
                                                                    <input class="form-control" type="text" name="profile_surename" placeholder="Mbiemri" value="<?php echo $row['mbiemri']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Emaili:</label>
                                                                    <input class="form-control" type="text" name="profile_email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label>About</label>
                                                                    <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                <button class="btn btn-primary" type="submit" name="profile_edit_submit" value="<?php echo $row['id']; ?>">Ndrysho profilin</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="mb-2"><b>Ndrysho Fjal&euml;kalimin</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Fjal&euml;kalimin Momental</label>
                                                                    <input class="form-control" type="password" placeholder="••••••" name="momental_password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Fjal&euml;kalimin i ri</label>
                                                                    <input class="form-control" type="password" placeholder="••••••" name="new_password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Konfirmoni <span class="d-none d-xl-inline">Fjal&euml;kalimin</span></label>
                                                                    <input class="form-control" type="password" placeholder="••••••" name="confirm_password">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit" name="user_password_edit" value="<?php echo $row['id']; ?>">Ndrysho Passwordin</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>
</div>



</body>

</html>