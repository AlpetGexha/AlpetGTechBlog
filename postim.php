<?php
include "server.php";
include "database/config.php";
$sql = "SELECT * from post";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
?>
<?php get_header("AlpetG Tech Blog - " . $row['titulli'] . ""); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 text-left">
            <div class="single_post">
                <div class="row">
                    <img src="assets/img/<?php echo $row['photo']; ?>" class="img-fluid" alt="image not available" style="width:900px;height:350px">

                    <h2><?php echo $row['titulli']; ?></h2>

                    <p><?php echo $row['body']; ?></p>
                </div>
            </div>
        </div>

        <?php get_widget(); ?>

    </div>
</div>

<?php get_footer(); ?>