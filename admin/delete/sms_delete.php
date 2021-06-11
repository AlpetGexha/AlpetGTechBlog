<?php

include "../../database/config.php";
include "../../server.php";
IamAdmin();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = "DELETE from kontakit where id='$id'";
    mysqli_query($db, $delete);

    if (!$delete == TRUE) {
        $msg = "False";
    } else {
        header('Location: ../admin_sms.php');
        $msg = "True";
    }
}
