<?php

include "server.php";
$id = $_REQUEST['id'];
$sql = "SELECT * from users where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();

$sql1 = "SELECT * from post where userid='$id'";
$result1 = mysqli_query($db, $sql1);
$rowcountkategorit = mysqli_num_rows($result1);

ob_start();
?>

<?php get_header("User - " . $row["username"] . ""); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item" style="color: #333 !important;">
        <a href="index.php" style="color: #333 !important;">Ballina</a>
    </li>
    </li>
    <li class=" breadcrumb-item active" style="color: #01cd74 !important;">User</li>
    <li class=" breadcrumb-item active" style="color: #01cd74 !important;"><?php echo $row['username']; ?></li>
</ol>
<div class="container">

    <div class="user-profile">

        <div class="container m-auto mt-5 d-flex justify-content-center">
            <div class="card p-3">
                <div class="media d-flex align-items-center">
                    <img src="assets/img/logo.jpg" class="rounded-circle" width="155">
                    <div class="ml-3 w-100">
                        <h4 class="mb-1 mt-1"><?php echo " " . $row['emri']  . " " . $row['mbiemri'] . " " ?></h4> <span class="span_username"><?php echo "@" . strtolower($row['username']) . "  " ?></span>
                        <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                            <div class="d-flex flex-column"> <span class="articles">Positme</span> <span class="number"><?php echo $rowcountkategorit; ?></span> </div>
                            <div class="d-flex flex-column"> <span class="articles">Loream</span> <span class="number">0</span> </div>
                            <div class="d-flex flex-column"> <span class="articles">Lorem</span> <span class="number">0</span> </div>
                        </div>
                        <!-- <div class="button mt-2 d-flex flex-row align-items-center"> <button class="btn btn-sm btn-outline-primary w-100">Chat</button> <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button> </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class=" container mt-5">
        <div class="row">
            <div class="col-lg-8 text-left">
                <div class="">
                    <div class="row">
                        <?php
                        $user_id = $row['id'];
                        get_post_id("post", "userid", $user_id);
                        ?>
                    </div>
                </div>
            </div>
            <?php get_widget(); ?>
        </div>
    </div>

    <?php get_footer(); ?>