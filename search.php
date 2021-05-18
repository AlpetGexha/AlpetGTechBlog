<?php
include "database/config.php";
include "server.php";
?>

<?php
$search = $_GET['search_post'];
get_header("Kerkimi - $search  - AlpetG Tech Blog ");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php" style="color: #333 !important; ">Home</a>
    </li>
    <li class="breadcrumb-item active" style="color: #007c46 !important;">Search</li>
    <li class="breadcrumb-item active" style="color: #01cd74 !important;"><?php echo " $search "; ?></li>
</ol>

<div class=" container">
    <h3 class="tittle">Rezultati i K&euml;rkimit</h3>
    <div class="row">
        <div class="col-lg-8 text-left">
            <div class="search">
                <div class="row">
                    <?php
                    if (isset($_GET['search_post'])) {
                        $search = $_GET['search_post'];
                        $sql = "SELECT * from post where titulli LIKE '%$search%' order by id DESC"; // "% $serach %" perafersish fjala qe e shenon per te kerkuar nje postim
                        $result = mysqli_query($db, $sql);
                        $row_count = mysqli_num_rows($result);

                        if ($row_count == 0) {
                            echo "<p class='null_result' style=color:#E9573F;><b>Na vjen keq por k&euml;rkimi juaj p&euml;r :<u style=color:black>$search</u> nuk ka resultat! Ju  lutem k&euml;rkoni p&euml;r&euml;ri</b></p>";
                        } else {
                            echo "<p style=color:#4FC1E9><b>Ju k&euml;rkuat p&euml;r :<u style=color:black> $search</u></b></p>";
                            echo "<p style=color:#37BC9B><b>Rezultati p&euml;r postime ($row_count)...</b></p>";
                        }

                        while (($row = $result->fetch_assoc()) != null) {

                            echo '
                        <div class="col-sm-6 d-flex justify-content-center col-cart-body">
                            <div class="">
                                <div class="card mt-3">
                                    <a href="postim.php?id=' . $row['id'] . '">
                                        <img src="assets/img/' . $row['photo'] . '" class="card-img-top" alt="Foto">
                                    </a>
                                    <div class="card-body">
                                    <i class="far fa-clock"></i>' . date('j F, Y ', strtotime($row['date']))  . '
                                    <i class="far fa-eye fa-x2"></i> ' . $row['views'] . '
                                        <h5 class="card-title"><a href="postim.php?id=' . $row['id'] . '">' . $row['titulli'] . '</a></h5>
                                        <a" href="postim.php?id=' . $row['id'] . '"><p> ' . $row['body'] . ' </p></a>
                                        
                                            <a class="btn btn-success" href="postim.php?id=' . $row['id'] . '">Meso m&euml; Shum&euml;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         ';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <?php get_widget(); ?>
    </div>
</div>


<?php get_footer(); ?>