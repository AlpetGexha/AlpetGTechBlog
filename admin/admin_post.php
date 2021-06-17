<?php

$msg = "";
include "../server.php";
include "../database/config.php";
IamAdmin();
?>

<?php get_Aheader("Post Admin"); ?>

<div id="layoutSidenav_content">

    <style>
        .modal_end {
            display: flex;
            flex-wrap: wrap;
            flex-shrink: 0;
            align-items: center;
            justify-content: flex-end;
            padding: 0.75rem;
        }
    </style>

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

        <div class="r-table">
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
                        <img src="" alt="">
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require("../database/config.php");
                    $c_sql = "SELECT p.id, p.titulli, p.body, p.category, p.date,p.photo, c.emri from post p, post_categories c WHERE p.category = c.id order by p.id DESC";
                    if ($result = mysqli_query($db, $c_sql)) {
                        $i = 1;

                        foreach ($result as $key => $post_row) {
                            //$ko_row['id']
                            echo ' <tr>
                        <td> ' . $i++ . ' </td> 
                        <td> <img src="../assets/img/post/' . $post_row['photo'] . '" class="table-img" alt="Foto">  </td>
                        <td> ' . $post_row["titulli"] . ' </td> 
                       <td> <textarea class="" rows="2" cols="40" readonly=""> ' . $post_row["body"] . '</textarea></td>
                       <td> ' . $post_row['emri'] . ' </td> 
                       <td> ' .  date('j F, Y ,h:i:s A', strtotime($post_row['date'])) . ' </td> 
                       <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_delete_' . $post_row["id"] . ' ">Fshije</a> /
                         <a class="btn btn-primary"  data-toggle="modal" data-target="#modal_edit_' . $post_row["id"] . ' ">Nrysho</a> </td>
                        </tr>  ';
                            //modal for delete
                            get_modal("delete_",$post_row["id"], "../server.php", "Kujedes", "A deshironi ta fshini Postimin<b> " . $post_row['titulli'] . "</b>", "danger", " PO! Fshijeni", "post_delete");
                            //modal for edit
                            get_modal("edit_",$post_row["id"], "../server.php", "Ndryshimi i postinit",
                                '
                                    <h6>Titulli</h6>
                                        <input type="text" class="form-control mt-2" name="post_titulli" autofocus="" required="" value="' . $post_row['titulli'] . '">
                                    <h6 class="mt-4">Teksti</h6>
                                    <textarea class="form-control" required="" placeholder="" id="floatingTextarea2" style="height: 220px" name="post_body"> ' . $post_row['body'] .
                                '</textarea>       
                                     <button type="submit" class="btn btn-primary" id="submit" value="' . $post_row['id'] . '" name="post_update">Ndrysho</button>                                                        
                            ',
                                "primary", ' Ndrysho Postimin ', "post_update"
                            );
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>



</body>

</html>