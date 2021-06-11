<?php
include "../../database/config.php";
include "../../server.php";
IamAdmin();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE  FROM post_categories WHERE  id = '$id'";
    $result = mysqli_query($db, $sql);

    $delete = "DELETE from post where id='$id'";
    $result = mysqli_query($db,$delete);

    if (!$result == TRUE) {
        $msg = "False";
    } else{
        header('Location: ../create_category.php');
        $msg = "True";
    }

}

