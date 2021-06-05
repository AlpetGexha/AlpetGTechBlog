<?php

$msg = "";
include "../server.php";
include "../database/config.php";
IamAdmin();
?>

<?php get_Aheader("Admin"); ?>

<div id="layoutSidenav_content">

    <div class="container-fluid mt-5 h-100">
        <?php
        if (!empty($msg)) {
            echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' . $msg . ' </strong>  <br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;<a href="apliko_online.php"></a></span>
    </button>
</div>';
        }
        ?>
        <h3 class="title">Postime</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Titulli</th>
                    <th scope="col">P&euml;rshkrimi</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Data</th>
                    <th scope="col">Opsionet</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require("../database/config.php");
                $c_sql = "SELECT p.id, p.titulli, p.body, p.category, p.date, c.emri from post p, post_categories c WHERE p.category = c.id order by p.id DESC";
                if ($result = mysqli_query($db, $c_sql)) {
                    $i = 1;

                    foreach ($result as $key => $post_row) {
                        //$ko_row['id']
                        echo ' <tr>
                        <td> ' . $post_row['id'] . ' </td> 
                        <td> ' . "img" . ' </td>
                        <td> ' . $post_row["titulli"] . ' </td> 
                       <td> <textarea class="" rows="2" cols="40" readonly=""> ' . $post_row["body"] . '</textarea></td>
                       <td> ' . $post_row['emri'] . ' </td> 
                       <td> ' .  date('j F, Y ,h:i:s A', strtotime($post_row['date'])) . ' </td> 
                       <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_' . $post_row["id"] . ' ">Fshije</a> </td>
                        </tr>  ';
                        get_modal($post_row["id"], "delete/post_delete.php", "Kujedes", "A deshironi ta fshini Postimin<b> ".$post_row['titulli']."</b>");
                    }
                }

                ?>

            </tbody>
        </table>

    </div>

    </div>

    </html>