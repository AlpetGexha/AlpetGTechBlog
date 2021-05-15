<?php
include "server.php";
include "database/config.php";
$id = $_REQUEST['id'];
$sql = "SELECT * from post_categories where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
?>

<?php get_header("" . $row["emri"] . " - AlpetG Tech Blog"); ?>



<?php get_footer(); ?>