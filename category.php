<?php
include "server.php";
include "database/config.php";
$id = $_REQUEST['id'];
$sql = "SELECT * from post_categories where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
?>

<?php get_header("" . $row["emri"] . " - AlpetG Tech Blog"); ?>

<style>

</style>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active"><?php echo $row['emri']; ?></li>
</ol>


<?php get_footer(); ?>