<?php
include "server.php";
include "database/config.php";
$id = $_REQUEST['id'];

//rrit viewsat per 1 pas cdo shikimi
mysqli_query($db, "UPDATE post set views = views +1  WHERE id ='$id' ");

$sql = "SELECT * from post where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();


?>
<?php get_header("" . $row['titulli'] . " - AlpetG Tech Blog "); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active"><?php echo "" . $row['titulli'] . ""; ?></li>
</ol>


<div class="container mt-5">
    <!-- <h3 class="tittle"></h3> -->
    <div class="row">
        <div class="col-lg-8 text-left mt-4">
            <div class="single_post">
                <div class="single_post_info">
                    <img src="assets/img/<?php echo $row['photo']; ?>" class="img-fluid" alt="image not available" style="width:900px;height:380px">
                    <div class="single_post_info_show">
                        <ul>
                            <li>
                                <a href="#">
                                <i class="far fa-calendar-alt"></i><?php echo  date('j F, Y ', strtotime($row['date'])) ?>
                                <i class="far fa-eye fa-x2"></i><?php echo $row['views']; ?>
                            </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <h1><?php echo $row['titulli']; ?></h1>

                <p><?php echo $row['body']; ?></p>
            </div>
        </div>

        <?php get_widget(); ?>

    </div>
</div>
<?php get_footer(); ?>