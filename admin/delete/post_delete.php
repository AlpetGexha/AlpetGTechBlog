<?php
include '../../database/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fshirja e fotos 
    $sql = "SELECT * from post where id = '$id'";
    $results = mysqli_query($db, $sql);
    $row = $results->fetch_assoc();
    unlink('../../assets/img/post/' . $row['photo']);
    mysqli_query($db,$sql); 

    //fshitja e postimit
    $sql1 = "DELETE FROM post WHERE id='$id'";
    $result = $db->query($sql1);

    if ($result == TRUE) {
        header('Location:../admin_post.php');
    }
}
