<?php
include "server.php";
include "database/config.php";
$id = $_REQUEST['id'];


$sql = "SELECT * from users where id='$id'";
$result = mysqli_query($db, $sql);
$row1 = $result->fetch_assoc();

$sql = "SELECT * from post_categories where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
?>

<?php get_header("" . $row["emri"] . ""); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php" style="color: #333 !important;">Ballina</a>
    </li>
    <li class=" breadcrumb-item active" style="color: #01cd74 !important;"><?php echo $row['emri']; ?></li>
</ol>

<div class=" container mt-5">
    <h3 class="tittle">Postimet p&euml;r <?php echo $row['emri']; ?></h3>
    <div class="row">
        <div class="col-lg-8 text-left">
            <div class="">
                <div class="row">
                    <?php 
                    $k_id = $row['id'];
                    get_post_id("post", "category", $k_id);
                    ?>
                </div>
            </div>
        </div>
        <?php get_widget(); ?>
    </div>
</div>

<?php get_footer(); ?>
</div>